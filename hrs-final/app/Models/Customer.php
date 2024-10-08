<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    #use HasFactory;

    protected $table = "customers";

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'address',
        'phoneNo',
    ];


    public function bookings (){
        return $this->hasMany("App\Booking");
    }
}
