<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'teacher_id',
        'training_id',
        'room_id',
        'label',
        'slot',
        'effective_duration',
        'subscription',
        'feedback',
    ];

    /**
     * Get the teacher that owns the training.
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

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
