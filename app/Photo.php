<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $fillable = ['user_id', 'album_id', 'songFile', 'songName', 'coverImage', 'artistName'];

    public function album()
    {
        return $this->belongsto('App\Album');
    }

}
