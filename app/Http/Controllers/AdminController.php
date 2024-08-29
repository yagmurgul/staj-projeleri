<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin(){

        return view('backend.include.index');
    }

    public function anasayfaAdmin(){

        return view('backend.include.anaSayfaAP');
    }

    public function hakkimizdaAdmin(){

        return view('backend.include.hakkimizdaAP');
    }
    public function mucevherAdmin(){

        return view('backend.include.mucevherAP');
    }

    public function bileklikAdmin(){

        return view('backend.include.bileklikAP');
    }

    public function kolyeAdmin(){

        return view('backend.include.kolyeAP');
    }

    public function saatAdmin(){

        return view('backend.include.saatAP');
    }

    public function yuzukAdmin(){

        return view('backend.include.yuzukAP');
    }

public function anasayfapost(Request $request){
     // Görsel dosyasını işleme
       // Görsel dosyasını işleme
       if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move('uploads' ,  $imageName);
        } else {
        $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
    }

        // Verileri veritabanına ekleme
        DB::table('anasayfa')->insert([
            'image' => $imageName ,
            'baslik' => $request->baslik,
            'icerik' => $request->icerik,
            'slug'=> $request-> slug,
        ]);

        // Başarıyla işlem tamamlandığında yönlendirme
        return redirect()->route('anasayfaAdmin')->with('success', 'Veri başarıyla eklendi.');

}

public function hakkimizdapost(Request $request){
    // Görsel dosyasını işleme
      // Görsel dosyasını işleme
      if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploads' ,  $imageName);
       } else {
       $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
   }

       // Verileri veritabanına ekleme
       DB::table('hakkımızda')->insert([
           'image' => $imageName ,
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'slug'=> $request-> slug,
       ]);

       // Başarıyla işlem tamamlandığında yönlendirme
       return redirect()->route('hakkimizdaAdmin')->with('success', 'Veri başarıyla eklendi.');

}

public function mucevherpost(Request $request){
    // Görsel dosyasını işleme
      // Görsel dosyasını işleme
      if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploads' ,  $imageName);
       } else {
       $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
   }

       // Verileri veritabanına ekleme
       DB::table('mucevher')->insert([
           'image' => $imageName ,
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'slug'=> $request-> slug,
           'fiyat' => $request->fiyat,
       ]);

       // Başarıyla işlem tamamlandığında yönlendirme
       return redirect()->route('mucevherAdmin')->with('success', 'Veri başarıyla eklendi.');

}
public function bileklikpost(Request $request){
    // Görsel dosyasını işleme
      // Görsel dosyasını işleme
      if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploads' ,  $imageName);
       } else {
       $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
   }

       // Verileri veritabanına ekleme
       DB::table('bileklik')->insert([
           'image' => $imageName ,
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'slug'=> $request-> slug,
           'fiyat' => $request->fiyat,
       ]);

       // Başarıyla işlem tamamlandığında yönlendirme
       return redirect()->route('bileklikAdmin')->with('success', 'Veri başarıyla eklendi.');

}

public function kolyepost(Request $request){
    // Görsel dosyasını işleme
      // Görsel dosyasını işleme
      if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploads' ,  $imageName);
       } else {
       $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
   }

       // Verileri veritabanına ekleme
       DB::table('kolye')->insert([
           'image' => $imageName ,
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'slug'=> $request-> slug,
           'fiyat' => $request->fiyat,
       ]);

       // Başarıyla işlem tamamlandığında yönlendirme
       return redirect()->route('kolyeAdmin')->with('success', 'Veri başarıyla eklendi.');

}
public function saatpost(Request $request){
    // Görsel dosyasını işleme
      // Görsel dosyasını işleme
      if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploads' ,  $imageName);
       } else {
       $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
   }

       // Verileri veritabanına ekleme
       DB::table('saat')->insert([
           'image' => $imageName ,
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'slug'=> $request-> slug,
           'fiyat' => $request->fiyat,
       ]);

       // Başarıyla işlem tamamlandığında yönlendirme
       return redirect()->route('saatAdmin')->with('success', 'Veri başarıyla eklendi.');

}

public function yuzukpost(Request $request){
    // Görsel dosyasını işleme
      // Görsel dosyasını işleme
      if ($request->hasFile('image')) {
       $image = $request->file('image');
       $imageName = time() . '.' . $image->getClientOriginalExtension();
       $image->move('uploads' ,  $imageName);
       } else {
       $imageName = null; // Görsel eklenmemişse null olarak ayarlanır
   }

       // Verileri veritabanına ekleme
       DB::table('yüzük')->insert([
           'image' => $imageName ,
           'baslik' => $request->baslik,
           'icerik' => $request->icerik,
           'slug'=> $request-> slug,
           'fiyat' => $request->fiyat,
       ]);

       // Başarıyla işlem tamamlandığında yönlendirme
       return redirect()->route('yuzukAdmin')->with('success', 'Veri başarıyla eklendi.');

}

    public function iletisimAdmin(){

        return view('backend.include.iletisimAdmin');
    }

    public function siparisAdmin(){

        return view('backend.include.siparisAdmin');
    }


}
