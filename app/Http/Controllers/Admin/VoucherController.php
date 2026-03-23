<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller {
    
    // Show vouchers, newest first
    public function index() {
        $vouchers = Voucher::orderBy('created_at', 'desc')->get();
        return view('admin_vouchers', compact('vouchers'));
    }

    // Create a new voucher
    public function create() {
        return view('admin_vouchers_create');
    }

    // Storeing new voucher
    public function store(Request $request) {
        // Need the following fields for a voucher
        $request->validate([
            'code' => 'required|unique:vouchers',
            'type' => 'required| in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today',
        ]);
        // Create the voucher
        Voucher::create([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expires_at' => $request->expires_at,
        ]);
        return redirect()->route('admin.vouchers')->with('success', 'Voucher created successfully.');
    }

    // Edit voucher
    public function edit($id) {
        $voucher = Voucher::find($id);
        // Error message if cant find id
        if(!$voucher) {
            return redirect()->route('admin.vouchers')->with('error', 'Voucher not found.');
        }

        return view('admin_vouchers_edit', compact('voucher'));
    }

    // Update voucher
    public function update(Request $request, $id) {
        $voucher = Voucher::find($id);
        // Error message if voucher doesn't exist
        if(!$voucher) {
            return redirect()->route('admin.vouchers')->with('error', 'Voucher not found.');
        }
        // Can update the voucher but the code doen't necessarilt have to change (because theu have to be unique)
        $request->validate([
            'code' => 'required|unique:vouchers,code,' . $voucher->id,
            'type' => 'required| in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today',
        ]);
        // Update the voucher with the new data
        $voucher->update([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expires_at' => $request->expires_at,

        ]);
        return redirect()->route('admin.vouchers')->with('success', 'Voucher updated successfully.');
    }

    // Delete voucher
    public function destroy($id) {
        $voucher = Voucher::find($id);
        // Error message if cant find id
        if(!$voucher) {
            return redirect()->route('admin.vouchers')->with('error', 'Voucher not found.');
        }

        $voucher->delete();
        return redirect()->route('admin.vouchers')->with('success', 'Voucher deleted.');
    }
}