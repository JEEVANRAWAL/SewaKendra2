<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    use HasFactory;
    //Relation defined with service model
    public function Service(){
        return $this->hasMany(Service::class, 'category_id');
    }
}
