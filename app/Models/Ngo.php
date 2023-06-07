<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ngo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id', 'state_id', 'city_id', 'address', 'zip_code'];
}
