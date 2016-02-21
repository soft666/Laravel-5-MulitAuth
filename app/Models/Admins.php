<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Admins extends User
{

	/**
	 * 
	 * @var string
	 */
	protected $table = 'admins';

    /**
     * 
     * @var array
     */
    protected $fillable = [
    	'name', 'email', 'password',
    ];

    /**
     * 
     * @var array
     */
    protected $hidden = [
    	'password', 'rememberToken',
    ];

}
