<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use SoftDeletes;

    protected $fillable = ['teacher_id', 'label'];

    /**
     * Get the teacher that owns the training.
     */
    public function teacher()
    {
        return $this->belongsTo('App\Teacher');
    }

     /**
     * Get the sessions for the training.
     */
    public function sessions()
    {
        return $this->hasMany('App\Session');
    }
}
