<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class porter extends Model
{
    use HasFactory;
    public function sale(){
        return $this->hasMany(sale::class);
    }

}
