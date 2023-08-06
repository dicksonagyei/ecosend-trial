<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerinfo extends Model
{
    use HasFactory;
    protected $fillable = ["name","description","address","country","state","city","zipcode"];

    public function items(){
        return $this->hasMany("App\Models\items");
    }
 
}
