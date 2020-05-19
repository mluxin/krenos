<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'teacher_id',
        'training_id',
        'room_id',
        'slot',
        'effective_duration',
        'subscription',
        'feedback',
    ];

     /**
     * The employees that belong to the session {PIVOT}
     */
    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }

    /**
     * Get the training that owns the session.
     */
    public function training()
    {
        return $this->belongsTo('App\Training');
    }

    /**
     * Get the room that owns the session.
     */
    public function room()
    {
        return $this->belongsTo('App\Room');
    }


}
