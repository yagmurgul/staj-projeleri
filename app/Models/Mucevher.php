<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mucevher extends Model
{
    use HasFactory;

    protected $table = 'mucevher'; // Tablo adını buraya yazın

    protected $fillable = ['image', 'baslik', 'icerik', 'fiyat'];
}

