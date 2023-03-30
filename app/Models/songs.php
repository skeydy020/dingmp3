<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class songs extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'thumb',
        'link',
        'description',
        'lyric',
        'album_id',
        'singer_id',
        'menu_id',
        'likes',
        'active'
       
    ];

    public function Singer()
    {
        return $this->hasOne(Singer::class, 'id', 'singer_id')
            ->withDefault(['name' => '']);
    }
    public function Album()
    {
        return $this->hasOne(Album::class, 'id', 'album_id')
            ->withDefault(['name' => '']);
    }
    public function Menu()
    {
        return $this->hasOne(Menu::class, 'id', 'menu_id')
            ->withDefault(['name' => '']);
    }
}
