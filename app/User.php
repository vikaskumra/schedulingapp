<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */  
	 
	 protected $table = 'users';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];  
	
	
	public function companies(){
		 return $this->belongsTo('App\Company');
	}  
	
	public function sendMail($to,$message, $subject){
		$headers = 'From:info@w3sols.com' . "\r\n" .
                     'Content-type:text/html'. "\r\n".
                     'X-Mailer: PHP/' . phpversion();   
        					 
		mail($to,$subject,$message, $headers);
	}
}
