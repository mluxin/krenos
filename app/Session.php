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
     * The employees that belong to the session.
     */
    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }
}
