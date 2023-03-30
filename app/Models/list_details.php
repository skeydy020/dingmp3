<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class list_details extends Model
{
    use HasFactory;
    protected $fillable =[
        'list_id',
        'song_id',
        'active'
    ];

    public function song()
    {
        return $this->hasOne(songs::class, 'id', 'song_id')
        ->withDefault(['name' => ''])
        ->withDefault(['link' => '']);
    }
}
