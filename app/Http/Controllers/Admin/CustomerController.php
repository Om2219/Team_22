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

    // show web page with customers
    public function webIndex()
    {
        $users = User::where('role', 'customer')->get();
        return view('admin_customers', compact('users'));
    }

    // create a new customer
    public function store(Request $request)
    {
        $request->validate([
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,customer'
        ]);

        User::create([
            'forename' => $request->forename,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'is_active' => true
        ]);

        return redirect()->route('admin.customers')->with('success', 'User created');
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

    // show create form
    public function create()
    {
        return view('admin_customers_create');
    }

    // toggle user ban/unban
    public function toggleStatus($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        
        $user->is_active = !$user->is_active;
        $user->save();
        
        $status = $user->is_active ? 'unbanned' : 'banned';
        return redirect()->back()->with('success', "User {$status}");
    }
}