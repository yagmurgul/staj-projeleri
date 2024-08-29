<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function checkout()
    {
        $user_id = Auth::id();
        $cartItems = Cart::with('mucevher')->where('user_id', $user_id)->get();
        $addresses = Auth::user()->addresses;
        // Sepet toplamlarını hesapla
        $totals = $this->calculateCartTotals($cartItems);

        // Ödeme sayfasını sepet verileri ile render et
        return view('frontend.include.ödeme', compact('cartItems', 'totals', 'addresses'));
    }

    public function index()
    {
        $user_id = Auth::id();
        $cartItems = Cart::with('mucevher')->where('user_id', $user_id)->get();

        // Sepet toplamlarını hesapla
        $totals = $this->calculateCartTotals($cartItems);

        // Ödeme sayfasını sepet verileri ile render et
        return view('frontend.include.ödeme', compact('cartItems', 'totals'));
    }

    private function calculateCartTotals($cartItems)
    {
        $subtotal = 0;
        $total = 0;

        foreach ($cartItems as $item) {
            $itemSubtotal = $item->quantity * floatval($item->mucevher->fiyat ?? 0);
            $subtotal += $itemSubtotal;
            $total += $itemSubtotal; // Şu anda total, subtotal ile aynı
        }

        return [
            'subtotal' => $subtotal,
            'total' => $total,
        ];
    }
}
