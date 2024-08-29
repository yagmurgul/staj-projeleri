<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{


    public function addCard(Request $request)
    {
        $request->validate([
            'card_number' => 'required|string|max:16',
            'expiry_date' => 'required|string|max:5',
            'card_holder' => 'required|string|max:255',
        ]);

        DB::table('cards')->insert([
            'user_id' => Auth::id(),
            'card_number' => $request->card_number,
            'expiry_date' => $request->expiry_date,
            'card_holder' => $request->card_holder,
        ]);

        return redirect()->route('profile')->with('success', 'Kart bilgileri başarıyla eklendi.');
    }

    public function orders()
    {
        $user = Auth::user();
        $orders = DB::table('orders')->where('user_id', $user->id)->get();

        return view('frontend.include.orders', compact('orders'));
    }

}
