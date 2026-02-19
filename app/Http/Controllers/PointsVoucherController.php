<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voucher;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PointsVoucherController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $offers = [
            [
                'id' => 'MONKEY500',
                'name' => '£5 off voucher',
                'cost_points' => 500,
                'type' => 'fixed',
                'value' => 5,
                'min_spend' => null,
                'days_valid' => 30,
            ],
            [
                'id' => 'MONKEY1000',
                'name' => '10% off voucher (min £20)',
                'cost_points' => 1000,
                'type' => 'percent',
                'value' => 10,
                'min_spend' => 20,
                'days_valid' => 30,
            ],
        ];

        $myVouchers = Voucher::where('user_id', $user->id)
            ->orderByDesc('id')
            ->get();

        return view('points_vouchers', compact('user', 'offers', 'myVouchers'));
    }

    public function redeem(Request $request)
    {
        $request->validate([
            'offer_id' => ['required', 'string'],
        ]);

        $userId = Auth::id();

        $offers = [
            'MONKEY500' => [
                'cost_points' => 500,
                'type' => 'fixed',
                'value' => 5,
                'min_spend' => null,
                'days_valid' => 30,
            ],
            'MONKEY1000' => [
                'cost_points' => 1000,
                'type' => 'percent',
                'value' => 10,
                'min_spend' => 20,
                'days_valid' => 30,
            ],
        ];

        if (!isset($offers[$request->offer_id])) {
            return back()->with('error', 'Invalid voucher selected');
        }

        $offer = $offers[$request->offer_id];
        $newCode = null;

        try {
            DB::transaction(function () use ($userId, $offer, &$newCode) {
                $user = User::where('id', $userId)->lockForUpdate()->firstOrFail();

                if ($user->points < $offer['cost_points']) {
                    throw new \RuntimeException('Not enough points');
                }

                do {
                    $newCode = 'PTS-' . Str::upper(Str::random(8));
                } while (Voucher::where('code', $newCode)->exists());

                // deduct points
                $user->points -= $offer['cost_points'];
                $user->save();

                Voucher::create([
                    'user_id' => $user->id,
                    'code' => $newCode,
                    'type' => $offer['type'],
                    'value' => $offer['value'],
                    'min_spend' => $offer['min_spend'],
                    'expires_at' => now()->addDays($offer['days_valid']),
                    'active' => true,
                ]);
            });
        } catch (\RuntimeException $e) {
            return back()->with('error', $e->getMessage());
        }

        return back()->with('success', "Voucher purchased :3 Your code is {$newCode}");
    }
}
