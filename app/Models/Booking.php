<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    //Relation defined with User model
    public function User(){
        return $this->belongsTo(User::class);
    }

    //Relation defined with service model
    public function Service(){
        return $this->belongsTo(Service::class);
    }

    //Relation defined with Payment model
    public function Payment(){
        return $this->hasMany(Payment::class);
    }
}
