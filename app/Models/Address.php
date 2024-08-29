<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    // Fillable property to allow mass assignment
    protected $fillable = [
        'name',
        'lastname',
        'address',
        'user_id',
        'phone',
        'state_country', // İl/İlçe
        'postal_zip',
        'email_address',
        'order_notes',
    ];

}
