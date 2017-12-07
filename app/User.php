<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    public $timestamps	= true;
    protected $table	= 'users';
    protected $fillable = [
		'first_name',
        'last_name',
        'password',
        'email',
        'remember_token',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
	protected $dates = [
	    'created_at',
        'updated_at',
    ];

}
