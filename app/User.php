<?php

namespace Panel;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //use Encryptable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $encryptable = [

    ];

    public function name(){
        return $this->first_name . ' ' . $this->last_name;
    }


}
