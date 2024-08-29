<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Address;


class AddressController extends Controller
{
    public function showAddresses()
    {

        $user_id = Auth::id();
        $addresses = Address::where('user_id', auth()->id())->get();

        return view('frontend.include.addresses', compact('addresses'));


    }

    public function addAddress(Request $request)
    {
        $user_id = Auth::id();
        $request->validate([
            'c_fname' => 'required|string|max:255',
            'c_lname' => 'required|string|max:255',
            'c_address' => 'required|string|max:255',
            'c_state_country' => 'required|string|max:255', // İl/İlçe
            'c_postal_zip' => 'required|string|max:10',
            'c_email_address' => 'required|email|max:255',
            'c_phone' => 'nullable|string|max:25', // Telefon numarası opsiyonel
            'c_order_notes' => 'nullable|string',
        ]);

        Address::create([
            'user_id' => auth()->id(),
            'name' => $request->c_fname,
            'lastname' => $request->c_lname,
            'address' => $request->c_address,
            'state_country' => $request->c_state_country,
            'postal_zip' => $request->c_postal_zip,
            'email_address' => $request->c_email_address,
            'phone' => $request->c_phone,
            'order_notes' => $request->c_order_notes,
        ]);


            return redirect()->route('profile.addresses')->with('success', 'Adres başarıyla eklendi.');

            return redirect()->route('profile.addresses')->with('error', 'Adres eklenirken bir hata oluştu.');

    }

    public function showAddressDetails($id)
    {
        $address = Address::findOrFail($id);
        return view('frontend.include.addressdetails', compact('address'));
    }

    public function deleteAddress($id)
    { $user_id = Auth::id();
        Address::findOrFail($id)->delete();
        return redirect()->route('profile.addresses')->with('success', 'Adres başarıyla silindi.');
    }

    public function getAddress($id)
    {

        $address = Address::findOrFail($id);
        return response()->json($address);
    }

}
