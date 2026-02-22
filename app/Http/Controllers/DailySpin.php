<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DailySpin extends Controller
{
    //
    public function spin(Request $request){
        $user = Auth::user();

        if ($user->dailySpin && $user->dailySpin->isToday()) {
            return response()->json(['error' => 'How Greedy, you only get one spin per day'], 403);
        }

        $user->dailySpin = now();
        $user->save();

        return response()->json(['success' => true]);
    }

    public function awardPoints($points){
        $user = Auth::user();
        $user->points += $points;
        $user->save();

        return response()->json(['newPoints' => $user->points]);
    }
}
