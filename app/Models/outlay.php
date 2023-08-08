<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outlay extends Model
{
    use HasFactory;
    protected $fillable=['note','price','user_id','worker_id'];
}
