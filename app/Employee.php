<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['user_id'];

     /**
     * The sessions that belong to the employee.
     */
    public function sessions()
    {
        return $this->belongsToMany('App\Session');
    }
}
