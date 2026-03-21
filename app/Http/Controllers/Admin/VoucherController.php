<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller {
    
    // Show vouchers
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
        $request->validate([
            'code' => 'required|unique:vouchers',
            'discount_amount' => 'required|numeric|min:0',
            'expiry_date' => 'required|date|after:today',
        ]);

        Voucher::create($request->only('code', 'discount_amount', 'expiry_date'));
        return redirect()->route('admin.vouchers')->with('success', 'Voucher created.');
    }

    // Edit voucher
    public function edit($id) {
        $voucher = Voucher::find($id);
        if(!$voucher) {
            return redirect()->route('admin.vouchers')->with('error', 'Voucher not found.');
        }

        return view('admin_vouchers_edit', compact('voucher'));
    }

    // Update voucher
    public function update(Request $request, $id) {
        $voucher = Voucher::find($id);
        if(!$voucher) {
            return redirect()->route('admin.vouchers')->with('error', 'Voucher not found.');
        }

        $request->validate([
            'code' => 'required|unique:vouchers,code,' . $voucher->id,
            'discount_amount' => 'required|numeric|min:0',
            'expiry_date' => 'required|date|after:today',
        ]);

        $voucher->update($request->only('code', 'discount_amount', 'expiry_date'));
        return redirect()->route('admin.vouchers')->with('success', 'Voucher updated.');
    }

    // Delete voucher
    public function destroy($id) {
        $voucher = Voucher::find($id);
        if(!$voucher) {
            return redirect()->route('admin.vouchers')->with('error', 'Voucher not found.');
        }

        $voucher->delete();
        return redirect()->route('admin.vouchers')->with('success', 'Voucher deleted.');
    }
}