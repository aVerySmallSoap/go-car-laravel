<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Agent;
use App\Models\Customer;
use http\Env\Response;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function create(): View{
        return view('customers.create', ['agents' => Agent::all()]);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store(CustomerRequest $request): RedirectResponse{
        $validated = $request->validated();
        Customer::create([
            'agent_name' => $validated['agent'],
            'customer_name' => $validated['name'],
            'customer_age' => $validated['age'],
            'customer_civilStatus' => $validated['civil'],
            'customer_contactNo' => $validated['contact'],
            'customer_facebookURL' => $validated['facebook']
        ]);
        return to_route('customers.display', ['data' => Customer::all()]);
    }

    public function update(CustomerRequest $request): JsonResponse{
        $validated = $request->validated();
        Customer::where('customer_id', $validated['id'])
            ->update([
                'agent_name' => $validated['agent'],
                'customer_name' => $validated['name'],
                'customer_age' => $validated['age'],
                'customer_civilStatus' => $validated['civil'],
                'customer_contactNo' => $validated['contact'],
                'customer_facebookURL' => $validated['facebook']
            ]);
        return response()->json(['Message' => 'Agents successfully updated!']);
    }

    public function destroy(string|int $id): RedirectResponse{
        Customer::destroy($id);
        return to_route('customers.display', ['data' => Customer::all()]);
    }
    public function fetchAll(): View {
        return view('customers.display', ['data' => Customer::all()] );
    }

    public function fetch(string $id):JsonResponse {
        $data = array();
        $customer = DB::table('customers')
            ->select([
                'customer_id',
                'agent_name',
                'customer_name',
                'customer_age',
                'customer_contactNo'
            ])
            ->where('customer_name', '=', $id)
            ->get();
        foreach ($customer[0] as $key => $value){
            $data[] = $value;
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }
}
