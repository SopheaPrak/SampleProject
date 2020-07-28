<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        return view('admin.customer.customerCreate');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return redirect('/ct');
    }

    public function show(){
        $customers = customer::orderBy('id')->get();
        return view('admin.customer.customerIndex', compact('customers'));
    }

    public function edit(Customer $customer)
    {
        return view('admin.customer.customerEdit', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
  
        $customer->update($data);

        return redirect("/ct");
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect('/ct');
    }
}
