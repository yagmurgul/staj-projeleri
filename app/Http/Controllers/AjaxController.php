<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function iletisimkaydet(Request $request)
    {
        try {
            DB::table('iletisim')->insert([
                'isim' => $request->isim,
                'soyisim' => $request->soyisim,
                'email' => $request->email,
                'konu' => $request->konu,
                'mesaj' => $request->mesaj,
            ]);



            return redirect()->route('iletisim')->with('success', 'Form başarıyla Gönderildi.');

        } catch (\Exception $e) {
            return redirect()->route('iletisim')->with('error', 'Formda eksik alan bırakmadan tekrar deneyiniz.');
        }



    }
}
