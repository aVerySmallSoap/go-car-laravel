<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Agent;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
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
}
