<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MV extends Model
{
    use HasFactory; 
    protected $fillable = [
        'name',
        'thumb',
        'link',
        'description',
        'singer_id',
        'likes',
        'active'
       
    ];

    public function Singer()
    {
        return $this->hasOne(Singer::class, 'id', 'singer_id')
            ->withDefault(['name' => '']);
    }
}
