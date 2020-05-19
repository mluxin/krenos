<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Field that can be filled in the DB
    protected $fillable = ['label'];

    /**
     * Get the sessions for the room.
     */
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }

}
