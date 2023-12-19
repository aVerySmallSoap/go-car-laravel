<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTripReceiptRequest;
use App\Http\Requests\PreTripReceiptRequest;
use App\Models\Customer;
use App\Models\Extension;
use App\Models\PostTripReceipt;
use App\Models\PreTripReceipt;
use App\Models\Receipt;
use App\Models\Released;
use App\Models\Reserved;
use App\Models\Vehicle;
use DateTime;
use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReceiptController extends Controller{

    public function genPreTripReceipt(): View{
        return view('generators.pre-trip', ['customers' => Customer::all()]);
    }

    public function genPostTripReceipt(string $pretrip): View{
        return view('generators.post-trip', [
            'pretrip' => PreTripReceipt::findOrFail($pretrip),
            'return_date' => date_create('now', new DateTimeZone('Asia/Manila'))
        ]);
    }

    public function genReceipt(string $posttrip): View{
        $post_trip = PostTripReceipt::where('pretrip_ID', $posttrip)->get()->first()->attributesToArray();
        $pre_trip = PreTripReceipt::where('pretrip_ID', $post_trip['pretrip_ID'])->get()->first()->attributesToArray();
        $hours = ($this->time_diff($pre_trip['pretrip_dateend'], $post_trip['posttrip_returnDate']) < 0) ?
                $this->time_diff($pre_trip['pretrip_dateend'], $post_trip['posttrip_returnDate']):0;
        $costByHour = $this->calculateHourlyDebt($pre_trip['pretrip_dateend'], $post_trip['posttrip_returnDate']);
        $costByExtension = $this->calculateExtensionTotal($pre_trip['pretrip_ID']);
        $total = $pre_trip['pretrip_total'] + $post_trip['posttrip_total'] + $costByHour + $costByExtension;
        return view('generators.receipt', [
            'post_trip' => $post_trip,
            'pretrip' => $pre_trip,
            'costByHour' => $costByHour,
            'extensions' => $costByExtension,
            'hours' => $hours,
            'total' => $total
            ]);
    }

    public function viewPreTripReceipts(): View{
        return view('receipts.pretrip.display',
            ['data' => PreTripReceipt::all([
                'pretrip_ID',
                'customer_name',
                'vehicle_plateNo',
                'pretrip_datestart',
                'pretrip_dateend',
                'pretrip_destination',
                'pretrip_total',
                'pretrip_createdAt'
            ])]);
    }

    public function viewPostTripReceipts(): View{
        return view('receipts.posttrip.display', ['data' => PostTripReceipt::all([
            'posttrip_ID',
            'pretrip_ID',
            'agent_name',
            'customer_name',
            'posttrip_returnDate',
            'posttrip_total',
            'posttrip_createdAt'])
        ]);
    }

    public function viewReceipts(): View{
        $receipts = DB::table('receipts')
            ->select([
                'receipt_ID',
                'customer_name',
                'agent_name',
                'vehicle_type',
                'vehicle_plateNo',
                'pretrip_destination',
                'receipt_total'
            ])
            ->get();
        return view('receipts.display', ['data' => $receipts]);
    }

    public function detailsPreTrip(string $id): View{
        return view('receipts.pretrip.view', ['data' => PreTripReceipt::findOrFail($id)]);
    }
    public function detailsPostTrip(string $id): View{
        return view('receipts.posttrip.view', ['data' => PostTripReceipt::findOrFail($id)]);
    }
    public function detailsReceipt(string $id): View{
        return view('receipts.view', ['data' => Receipt::findOrFail($id)]);
    }

    public function destroyReceipt(string $id): View{
        Receipt::destroy($id);
        return $this->viewReceipts();
    }

    public function generatePreTrip(PreTripReceiptRequest $request): JsonResponse{
        $input = $request->validated();
        $requestDate = date_create('now', new DateTimeZone('Asia/Manila'))
            ->format('Y-m-d H:i:s');
        //Deposit + (Rent Cost + Destination) + (Gas + (Car wash + Helmet))
        $carwash_cost = ($input['vehicle_type'] == 'Car') ? 200:80;
        $deposit_cost = (($input['vehicle_type'] == 'Car') ? 500:200);
        $gas_cost = $input['gas'] * $input['gas_price'];
        $optionals_cost = $gas_cost + ((($input['wash'] == 1) ? $carwash_cost:0) + (($input['helmet'] == 1) ? 150:0));
        $total = $deposit_cost + ($input['vehicle_rentPrice'] + $input['destination-price']) + $optionals_cost;
        PreTripReceipt::create([
            'agent_name' => $input['agent_name'],
            'customer_name' => $input['customer_name'],
            'vehicle_type' => $input['vehicle_type'],
            'vehicle_plateNo' => $input['vehicle_plateNo'],
            'pretrip_typeOfID' => $input['validIdentification'],
            'pretrip_datestart' => $input['start-date'],
            'pretrip_dateend' => $input['end-date'],
            'pretrip_destination' => $input['destination'],
            'pretrip_destinationPrice' => $input['destination-price'],
            'pretrip_initialGas' => $input['initial-gas'],
            'pretrip_requestGasLiters' => $input['gas'],
            'pretrip_requestGasPrice' => $input['gas_price'],
            'pretrip_requestWash' => $input['wash'],
            'pretrip_requestHelmet' => $input['helmet'],
            'pretrip_total' => $total,
            'pretrip_createdAt' => $requestDate,
        ]);
        $latest_id = DB::select('select max(pretrip_ID) as latest from pretripreceipts');
        VehicleController::reserveVehicle($input['vehicle_type'], $input['vehicle_plateNo']);
        Reserved::create([
            'vehicle_type' => $input['vehicle_type'],
            'vehicle_plateNo' => $input['vehicle_plateNo'],
            'customer_name' => $input['customer_name'],
            'pretrip_ID' => $latest_id[0]->latest,
            'reserved_reservationDate' => $requestDate
        ]);
        return response()->json(['type'=>'success']);
    }

    public function generatePostTrip(PostTripReceiptRequest $request): JsonResponse{
        $input = $request->validated();
        $requestDate = date_create('now', new DateTimeZone('Asia/Manila'))
            ->format('Y-m-d H:i:s');
        $gas_calc = ($input['gas'] < $input['initial-gas']) ?
            (($input['initial-gas'] - $input['gas']) * $input['gas-price']) : 0;
        $total = $input['optional-cost'] + $gas_calc;
        PostTripReceipt::create([
            'pretrip_ID' => $input['pretrip'],
            'agent_name' => $input['agent'],
            'customer_name' => $input['customer'],
            'posttrip_returnDate' => date_create($input['return-date']),
            'posttrip_gasBar'  => $input['gas'],
            'posttrip_damageReport' => $input['comment'],
            'posttrip_optionalCost' => $input['optional-cost'],
            'posttrip_total' => $total,
            'posttrip_createdAt' => $requestDate
        ]);
        $receipt = PostTripReceipt::select(['pretrip_ID as id'])
            ->where('pretrip_ID', $input['pretrip'])
            ->get()->first()->attributesToArray();
        Released::where('pretrip_ID', $input['pretrip-id'])
            ->delete();
        return response()->json(['type' => 'success', 'id' => $receipt['id']]);
    }

    public function generateReceipt(Request $request){
        $requestDate = date_create('now', new DateTimeZone('Asia/Manila'))
            ->format('Y-m-d H:i:s');
        $input = $request->all();
        Vehicle::where('vehicle_type', $input['vehicle-type'])
            ->where('vehicle_plateNo', $input['vehicle-plateNo'])
            ->update(['vehicle_isAvailable' => 1]);
        Receipt::create([
            'pretrip_ID' => $input['pretrip-id'],
            'posttrip_ID' => $input['posttrip-id'],
            'pretrip_initialGas' => $input['pretrip-initial-gas'],
            'pretrip_requestGasLiters' => $input['pretrip-request-gas'],
            'pretrip_requestGasPrice' => $input['pretrip-request-gas-price'],
            'pretrip_requestWash' => $input['pretrip-request-wash'],
            'pretrip_requestHelmet' => $input['pretrip-request-helmet'],
            'posttrip_gasBar' => $input['posttrip-gas'],
            'posttrip_optionalCost' => $input['posttrip-optional'],
            'customer_name' => $input['customer'],
            'agent_name' => $input['agent'],
            'pretrip_destination' => $input['pretrip-destination'],
            'vehicle_type' => $input['vehicle-type'],
            'vehicle_plateNo' => $input['vehicle-plateNo'],
            'pretrip_dateend' => $input['pretrip-date-end'],
            'posttrip_returnDate' => $input['posttrip-return-date'],
            'receipt_hourDeficit' => $input['receipt-hours'],
            'receipt_hourCostDeficit' => $input['receipt-hours-cost'],
            'receipt_total' => $input['receipt-total'],
            'receipt_createdAt' => $requestDate
        ]);
        return response()->json(['type' => 'success']);
    }

    private function calculateHourlyDebt(DateTime|string $date1, DateTime|string $date2): float|int {
        $debt = $this->time_diff($date1, $date2);
        return ((($debt < 0) ? abs($debt):0) * 25);
    }

    private function time_diff(DateTime|string $date1, DateTime|string $date2): float|int{
        return round((
            (strtotime($date1) - strtotime($date2)) / 3600
        ));
    }

    private function calculateExtensionTotal(string $pretrip){
        $data = Extension::selectRaw('sum(extension_cost) as total')
            ->where('pretrip_ID', $pretrip)->get()->first()->attributesToArray()['total'];
        return $data;
    }
}
