<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    use HasFactory;
    public function Straples(){
        return $this->belongsTo(straples::class,'foreign_key','owner_key');
    }

    public function Porter(){
        return $this->belongsTo(porter::class,'foreign_key','owner_key');
    }
}
