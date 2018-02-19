<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
        'album_name', 'album_description', 'cover_image'
    ];

    public function user()
    {
        $this->belongsTo('User');
    }

    public function photos()
    {
        $this->hasMany('Photo');
    }
}
