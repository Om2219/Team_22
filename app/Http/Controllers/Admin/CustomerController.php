<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller {
    
    // Listing the customers
    public function index() {
        $customers = User::where('role', 'customer')->get();
        return response()->json($customers);
    }

    // Web view
    public function webIndex(Request $request) {
        $query = User::where('role', 'customer');

        // search using name and email
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('forename', 'like', '%' . $request->search . '%')
                ->orWhere('surname', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        // filter by ban or not banned
        if ($request->status && $request->status != 'all') {
            if ($request->status == 'active') {
                $query->where('is_active', 1);
            } elseif ($request->status == 'banned') {
                $query->where('is_active', 0);
            }
        }

        // sort
        $sort = $request->get('sort');
        if ($sort == 'name_asc') {
            $query->orderBy('forename', 'asc');
        } elseif ($sort == 'name_desc') {
            $query->orderBy('forename', 'desc');
        } elseif ($sort == 'newest') {
            $query->orderBy('created_at', 'desc');
        } elseif ($sort == 'oldest') {
            $query->orderBy('created_at', 'asc');
        } else {
            $query->orderBy('id', 'asc');
        }

        // 20 items per page
        $users = $query->paginate(20)->withQueryString();
        return view('admin_customers', compact('users'));
    }

    // Create a new customer
    public function store(Request $request) {
        $validate = $request->validate([
            'forename' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
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

    //  Customer details
    public function show($id) {
        $customer = User::where('role', 'customer')->findOrFail($id);
        return response()->json($customer);
    }

    // Update a customer
    public function update(Request $request, $id) {
        $customer = User::where('role', 'customer')->findOrFail($id);

        $request->validate([
            'forename' => 'sometimes|required|string|max:255',
            'surname' => 'sometimes|required|string|max:255',
            'email' => "sometimes|required|email|unique:users,email,$id",
            'password' => 'sometimes|required|string|min:6',
            'is_active' => 'sometimes|boolean',
        ]);

        if ($request->has('forename')) {
            $customer->forename = $request->forename;
        }

        if ($request->has('surname')) {
            $customer->surname = $request->surname;
        }

        if ($request->has('email')) {
            $customer->email = $request->email;
        }

        if ($request->has('password')) {
            $customer->password = Hash::make($request->password);
        }

        if ($request->has('is_active')) {
            $customer->is_active = $request->is_active;
        }

        $customer->save();
        return redirect()->route('admin.customers')-> with('success', 'User updated Successfully');

    }

    // Delete a customer
    public function destroy($id) {
        $customer = User::where('role', 'customer')->findOrFail($id);
        $customer->delete();
        return redirect()->route('admin.customers')-> with('success', 'User deleted Successfully');

    }

    // Showing the create a customer form
    public function create() {
        return view('admin_customers_create');
    }

    

    //  Customer edit
    public function edit($id) {
        $user = User::where('role', 'customer')->findOrFail($id);
        return view('admin_customers_edit', compact('user'));

    }
}