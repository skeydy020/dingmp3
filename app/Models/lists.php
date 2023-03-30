<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lists extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'thumb',
        'user_id',
        'active'
    ];
}
