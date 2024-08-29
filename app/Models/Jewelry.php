<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jewelry extends Model
{
    use HasFactory;
    protected $table = 'mucevher'; // Tablo adını buraya yazın
    protected $fillable = [
        'baslik', 'fiyat', 'image', 'icerik'
    ];
}
