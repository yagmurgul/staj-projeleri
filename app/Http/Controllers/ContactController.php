<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function adminIndex()
    {
        $entries = DB::table('iletisim')->get(); // İletişim tablosundaki tüm verileri al
        return view('backend.include.iletisimAdmin', ['entries' => $entries]); // Verileri view'a gönder
    }

    public function deleteEntry($id)
    {
        try {
            DB::table('iletisim')->where('id', $id)->delete(); // Belirli bir kaydı sil
            return redirect()->route('admin.iletisim')->with('success', 'Kayıt başarıyla silindi.');
        } catch (\Exception $e) {
            return redirect()->route('admin.iletisim')->with('error', 'Kayıt silinirken bir hata oluştu.');
        }
    }

    public function showDetails($id)
    {
        $entry = DB::table('iletisim')->where('id', $id)->first(); // Belirli bir kaydın detaylarını al
        return view('backend.include.iletisimDetails', ['entry' => $entry]); // Detayları view'a gönder
    }
}
