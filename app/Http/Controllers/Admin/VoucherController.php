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
            'type' => 'required| in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today',
        ]);

        Voucher::create([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expires_at' => $request->expires_at,
        ]);
            
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
            'type' => 'required| in:fixed,percent',
            'value' => 'required|numeric|min:0',
            'expires_at' => 'required|date|after:today',
        ]);

        $voucher->update([
            'code' => $request->code,
            'type' => $request->type,
            'value' => $request->value,
            'expires_at' => $request->expires_at,

        ]);
            
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