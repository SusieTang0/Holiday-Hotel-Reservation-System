<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    #use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
        'customerID',
        'roomNo',
        'checkIn',
        'checkOut',
        'numberOfDays',
        'numberOfGuests',
        'price'
    ] ;

    public function customer(){
        return $this ->belongsTo('App\Customer');
    }
}
