<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearningCenter extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

     protected $fillable = [
        'ngo_id',
        'name',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'address',
        'type'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function ngo(){
        return $this->belongsTo(Ngo::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
}
