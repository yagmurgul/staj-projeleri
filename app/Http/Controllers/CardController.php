<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use Auth;


class CardController extends Controller
{
    public function addCard(Request $request)
    {
        $request->validate([
            'card_number' => 'required|string|max:16',
            'expiry_date' => 'required|string|max:5',
            'card_holder' => 'required|string|max:255',
        ]);

        Card::create([
            'card_number' => $request->input('card_number'),
            'expiry_date' => $request->input('expiry_date'),
            'card_holder' => $request->input('card_holder'),
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('profile.cards')->with('success', 'Kart bilgileri başarıyla eklendi.');
    }

    public function showCards()
    {
        $cards = Card::where('user_id', Auth::id())->get();
        return view('frontend.include.kartbilgileri', compact('cards'));
    }

    public function showCardDetails($id)
    {
        $card = Card::findOrFail($id);
        return view('frontend.include.kartdetay', compact('card'));
    }

    public function deleteCard($id)
    {
        $card = Card::findOrFail($id);
        $card->delete();
        return redirect()->route('profile.cards')->with('success', 'Kart başarıyla silindi.');
    }
}
