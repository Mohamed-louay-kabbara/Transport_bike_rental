<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class straples extends Model
{
    use HasFactory;
    protected $fillable=['number','type','user_id'];
    
    public function Straple(){
        return $this->hasMany(sale::class);
    }
    public function User(){
        return $this->belongsTo(User::class,'foreign_key','owner_key');
    }

}
