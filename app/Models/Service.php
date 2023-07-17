<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'provider_id',
        'name',
        'category_id',
        'price',
        'description',
        'img'
    ];

    //Relation defined with Serviceprovider model
    public function ServiceProvider(){
        return $this->belongsTo(ServiceProvider::class, 'provider_id');
    }

    //Relation defined with ServiceCategory model
    public function ServiceCategory(){
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    //Relation defined with Booking model
    public function Booking(){
        return $this->hasMany(Booking::class);
    }
}
