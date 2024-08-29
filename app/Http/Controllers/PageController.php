<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about(){

        $hakkimizdakRecords = DB::table('hakkımızda')->get();
        return view('frontend.include.about',compact("hakkimizdakRecords"));
    }

    public function mucevher(){

        $mucevherRecords = DB::table('mucevher')->get();
        return view('frontend.include.mucevher', compact("mucevherRecords"));
    }

    public function saat(){
        $saatRecords = DB::table('saat')->get();
        return view('frontend.include.saat',compact("saatRecords"));

    }

    public function bileklik(){
        $bileklikRecords = DB::table('bileklik')->get();
        return view('frontend.include.bileklik',compact("bileklikRecords"));

    }
    public function kolye(){
        $kolyeRecords = DB::table('kolye')->get();
        return view('frontend.include.kolye',compact("kolyeRecords"));

    }
    public function yuzuk(){
        $yuzukRecords = DB::table('yüzük')->get();
        return view('frontend.include.yuzuk',compact("yuzukRecords"));
    }

    public function iletisim(){
        return view('frontend.include.iletisim');
    }


    public function urundetay(){

        return view('frontend.include.urundetay');
    }
    public function showUrun($slug){
        $urunRecord = DB::table('mucevher')->where('slug', $slug)->first();
        return view('frontend.include.urundetay', compact('urunRecord'));

    }

    public function showSaat($slug){
        $saatRecord = DB::table('saat')->where('slug', $slug)->first();
        return view('frontend.include.saatdetay', compact('saatRecord'));

    }

    public function saatdetay(){

        return view('frontend.include.saatdetay');
    }

    public function bileklikdetay(){

        return view('frontend.include.bileklikdetay');
    }

    public function showBileklik($slug){
        $bileklikRecord = DB::table('bileklik')->where('slug', $slug)->first();
        return view('frontend.include.bileklikdetay', compact('bileklikRecord'));

    }

    public function showKolye($slug){
        $kolyeRecord = DB::table('kolye')->where('slug', $slug)->first();
        return view('frontend.include.kolyedetay', compact('kolyeRecord'));


}

    public function kolyedetay(){

        return view('frontend.include.kolyedetay');
    }

    public function showYuzuk($slug){
        $yuzukRecord = DB::table('yüzük')->where('slug', $slug)->first();
        return view('frontend.include.yuzukdetay', compact('yuzukRecord'));
}

    public function yuzukdetay(){
        return view('frontend.include.yuzukdetay');
}

    public function adresler(){

        return view('frontend.include.adresler');
    }

    public function kartlar(){

        return view('frontend.include.kartlar');
    }

    public function profil(){
        return view('layouts.profil');
    }

    public function profilsabit(){
        return view('layouts.data.profilsabit');
    }

    public function addresses(){
        return view('frontend.include.addresses');
    }

    public function kartbilgileri(){
        return view('frontend.include.kartbilgileri');
    }

    public function thankyou(){
        return view('frontend.include.thankyou');
    }
}
