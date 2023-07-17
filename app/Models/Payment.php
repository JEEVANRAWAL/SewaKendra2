<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    //Relation defined with Booking model
    public function Booking(){
        return $this->belongsTo(Booking::class);
    }
}
