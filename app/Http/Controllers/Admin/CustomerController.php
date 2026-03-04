<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    // list of all customers
    public function index()
    {
        $customers = User::where('role', 'customer')->get();
        return response()->json($customers);
    }

    // create a new customer
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $customer = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        return response()->json($customer, 201);
    }

    //  customer details
    public function show($id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);
        return response()->json($customer);
    }

    // update a customer
    public function update(Request $request, $id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => "sometimes|required|email|unique:users,email,$id",
            'password' => 'sometimes|required|string|min:6',
        ]);

        if ($request->has('name')) {
            $customer->name = $request->name;
        }
        if ($request->has('email')) {
            $customer->email = $request->email;
        }
        if ($request->has('password')) {
            $customer->password = Hash::make($request->password);
        }
        $customer->save();

        return response()->json($customer);
    }

    // delete a customer
    public function destroy($id)
    {
        $customer = User::where('role', 'customer')->findOrFail($id);
        $customer->delete();
        return response()->json(['message' => 'Customer deleted successfully']);
    }
}