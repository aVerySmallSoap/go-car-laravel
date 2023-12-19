<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Customer;
use App\Models\Leaser;
use App\Models\PostTripReceipt;
use App\Models\PreTripReceipt;
use App\Models\Receipt;
use App\Models\Released;
use App\Models\Reserved;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class SearchController extends Controller{

    public function search(Request $request){
        $input = $request->all();
        $data = array();
        $query = "%".$input['query']."%";
        switch ($input['table']){
            case "agents":
                $response = Agent::query()
                    ->select(['agent_ID', 'agent_name', 'agent_age', 'agent_address'])
                    ->orWhere('agent_ID', 'like', $query)
                    ->orWhere('agent_name', 'like', $query)
                    ->orWhere('agent_age', 'like', $query)
                    ->orWhere('agent_address', 'like', $query)->get();
                break;
            case "customers":
                $response = Customer::query()
                    ->select([
                        'customer_ID',
                        'agent_name',
                        'customer_name',
                        'customer_age',
                        'customer_civilStatus',
                        'customer_contactNo',
                        'customer_facebookURL'])
                    ->orWhere('customer_ID', 'like', $query)
                    ->orWhere('agent_name', 'like', $query)
                    ->orWhere('customer_name', 'like', $query)
                    ->orWhere('customer_age', 'like', $query)
                    ->orWhere('customer_civilStatus', 'like', $query)
                    ->orWhere('customer_contactNo', 'like', $query)
                    ->orWhere('customer_facebookURL', 'like', $query)->get();
                break;
            case "vehicles":
                $response = Vehicle::query()
                    ->select(['vehicle_plateNo', 'vehicle_model', 'vehicle_type', 'vehicle_color', 'leaser_name'])
                    ->orWhere('vehicle_plateNo', 'like', $query)
                    ->orWhere('vehicle_model', 'like', $query)
                    ->orWhere('vehicle_type', 'like', $query)
                    ->orWhere('vehicle_color', 'like', $query)
                    ->orWhere('leaser_name', 'like', $query)->get();
                break;
            case "leasers":
                $response = Leaser::query()
                    ->select(['leaser_id', 'leaser_name', 'leaser_age', 'leaser_address', 'leaser_contactNo'])
                    ->orWhere('leaser_id', 'like', $query)
                    ->orWhere('leaser_name', 'like', $query)
                    ->orWhere('leaser_age', 'like', $query)
                    ->orWhere('leaser_address', 'like', $query)
                    ->orWhere('leaser_contactNo', 'like', $query)->get();
                break;
            case "pretripreceipts":
                $response = PreTripReceipt::query()
                    ->select([
                        'pretrip_ID',
                        'customer_name',
                        'vehicle_plateNo',
                        'pretrip_datestart',
                        'pretrip_dateend',
                        'pretrip_destination',
                        'pretrip_total',
                        'pretrip_createdAt'])
                    ->orWhere('pretrip_ID', 'like', $query)
                    ->orWhere('customer_name', 'like', $query)
                    ->orWhere('vehicle_plateNo', 'like', $query)
                    ->orWhere('pretrip_datestart', 'like', $query)
                    ->orWhere('pretrip_dateend', 'like', $query)
                    ->orWhere('pretrip_destination', 'like', $query)
                    ->orWhere('pretrip_total', 'like', $query)
                    ->orWhere('pretrip_createdAt', 'like', $query)->get();
                break;
            case "reserved_vehicles":
                $response = Reserved::query()
                    ->select([
                        'reserved_ID',
                        'vehicle_type',
                        'vehicle_plateNo',
                        'customer_name',
                        'pretrip_ID',
                        'reserved_reservationDate'])
                    ->orWhere('reserved_ID', 'like', $query)
                    ->orWhere('vehicle_type', 'like', $query)
                    ->orWhere('vehicle_plateNo', 'like', $query)
                    ->orWhere('customer_name', 'like', $query)
                    ->orWhere('pretrip_ID', 'like', $query)
                    ->orWhere('reserved_reservationDate', 'like', $query)->get();
                break;
            case "released":
                $response = Released::query()
                    ->select([
                        'released_ID',
                        'pretrip_ID',
                        'vehicle_plateNo',
                        'vehicle_type',
                        'vehicle_model',
                        'customer_name',
                        'pretrip_dateend'])
                    ->orWhere('released_ID', 'like', $query)
                    ->orWhere('pretrip_ID', 'like', $query)
                    ->orWhere('vehicle_plateNo', 'like', $query)
                    ->orWhere('vehicle_type', 'like', $query)
                    ->orWhere('vehicle_model', 'like', $query)
                    ->orWhere('customer_name', 'like', $query)
                    ->orWhere('pretrip_dateend', 'like', $query)->get();
                break;
            case "posttripreceipts":
                $response = PostTripReceipt::query()
                    ->select([
                        'posttrip_ID',
                        'pretrip_ID',
                        'agent_name',
                        'customer_name',
                        'posttrip_returnDate',
                        'posttrip_total',
                        'posttrip_createdAt'])
                    ->orWhere('posttrip_ID', 'like', $query)
                    ->orWhere('pretrip_ID', 'like', $query)
                    ->orWhere('agent_name', 'like', $query)
                    ->orWhere('posttrip_returnDate', 'like', $query)
                    ->orWhere('posttrip_total', 'like', $query)
                    ->orWhere('posttrip_createdAt', 'like', $query)->get();
                break;
            case "receipts":
                $response = Receipt::query()
                    ->select([
                        'receipt_ID',
                        'customer_name',
                        'agent_name',
                        'vehicle_type',
                        'vehicle_plateNo',
                        'pretrip_destination',
                        'receipt_total'])
                    ->orWhere('receipt_ID', 'like', $query)
                    ->orWhere('customer_name', 'like', $query)
                    ->orWhere('agent_name', 'like', $query)
                    ->orWhere('vehicle_type', 'like', $query)
                    ->orWhere('vehicle_plateNo', 'like', $query)
                    ->orWhere('pretrip_destination', 'like', $query)
                    ->orWhere('receipt_total', 'like', $query)->get();
                break;
            default: return response()->json(['type' => 'error']);
        }
        foreach ($response->all() as $item){
            $element = array();
            foreach($item->attributesToArray() as $key => $value){
                $element[] = $value;
            }
            $data[] = $element;
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }
}
