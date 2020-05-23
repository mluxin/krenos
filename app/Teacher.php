<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['user_id'];


    /**
     * Get the user record associated with the teacher.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the trainings for the teacher.
     */
    public function trainings()
    {
        return $this->hasMany('App\Training');
    }

     /**
     * Get the sessions for the teacher.
     */
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }



}
