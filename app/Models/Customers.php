<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Customers extends User
{
    /**
	 * 
	 * @var string
	 */
	protected $table = 'customers';

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
