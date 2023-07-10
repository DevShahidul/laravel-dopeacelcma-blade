<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'phone',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address',
        'ngo_id',
        'user_id',
        'designation_id',
        'facebook_url',
        'whatsapp_number',
    ];
}
