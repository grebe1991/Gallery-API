<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function album()
    {
        return $this->belongsTo('App\Album');
    }

    // todo
    public function saveToCloud()
    {

    }
}
