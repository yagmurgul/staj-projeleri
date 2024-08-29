<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Card;
use App\Models\Order;
use Auth;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address_detail' => 'nullable|string|max:255',
            'state_country' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'order_notes' => 'nullable|string',
        ]);

        $order = new Order();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->address = $request->address;
        $order->address_detail = $request->address_detail;
        $order->state_country = $request->state_country;
        $order->postal_code = $request->postal_code;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->order_notes = $request->order_notes;
        $order->save();

        return redirect()->back()->with('success', 'Adres başarıyla kaydedildi!');
    }
}
