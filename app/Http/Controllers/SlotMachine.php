<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class SlotMachine extends Controller
{
    //
    public function spin(Request $request)
    {
        $user = Auth::user();
        $pointsChange = intval($request->points);

        if($user->points + $pointsChange < 0){
            return response()->json([
                'success' => false,
                'message' => 'Silly Monkey Out of bananas 🦧',
                'points' => $user->points
            ]);
        }

        $user->points += $pointsChange;
        $user->save();

        return response()->json([
            'success' => true,
            'points' => $user->points
        ]);
    }
}
