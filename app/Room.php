<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    // Field that can be filled in the DB
    protected $fillable = ['label'];
}
