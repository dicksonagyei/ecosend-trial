<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    use HasFactory;
    protected $fillable =["productName","price","quantity"];

    public function customerinfo(){
        return $this->belongsTo("App\Models\customerinfo");
    }
}
