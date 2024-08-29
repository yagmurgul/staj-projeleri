<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function sepet()
    {
        $user_id = Auth::id();
        $cartItems = Cart::with('mucevher')->where('user_id', $user_id)->get();

        // Toplamları hesaplayın
        $totals = $this->calculateCartTotals($cartItems);

        return view('frontend.include.sepet', compact('cartItems', 'totals'));
    }

    public function updateCart(Request $request)
    {
        $user_id = Auth::id();
        foreach ($request->input('quantity') as $productId => $quantity) {
            $cartItem = Cart::where('user_id', $user_id)
                            ->where('product_id', $productId)
                            ->first();

            if ($cartItem) {
                $cartItem->quantity = $quantity;
                $cartItem->save();
            }
        }

        return redirect()->back()->with('success', 'Sepet güncellendi.');
    }

    public function removeFromCart($productId)
    {
        $user_id = Auth::id();
        Cart::where('user_id', $user_id)->where('product_id', $productId)->delete();

        return redirect()->back()->with('success', 'Ürün sepetten kaldırıldı.');
    }

    public function addToCart(Request $request)
    {
        $user_id = Auth::id();
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        // Sepette ürün olup olmadığını kontrol et
        $cartItem = Cart::where('user_id', $user_id)
                        ->where('product_id', $product_id)
                        ->first();

        if ($cartItem) {
            // Ürün varsa, miktarı güncelle
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Ürün yoksa, yeni bir kayıt oluştur
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->back()->with('success', 'Ürün sepete eklendi.');
    }

    public function calculateCartTotals($cartItems)
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
