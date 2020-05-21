<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the teacher record associated with the user.
     */
    public function teacher()
    {
        return $this->hasOne('App\Teacher');
    }

    /**
     * Get the employee record associated with the user.
     */
    public function employee()
    {
        return $this->hasOne('App\Employee');
    }

    //Const creation for admin management
    const ADMIN = 'admin';
    const TEACHER = 'teacher';
    const EMPLOYEE = 'employee';
    const DEFAULT = 'user';

    const ROLES = [
        'admin' => self::ADMIN,
        'teacher' => self::TEACHER,
        'employee' => self::EMPLOYEE,
        'default' => self::DEFAULT,
    ];

}
