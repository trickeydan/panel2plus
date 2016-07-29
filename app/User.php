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

    public $fields = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'phone' => 'Phone Number',
        'line1' => 'Address Line 1',
        'line2' => 'Address Line 2',
        'line3' => 'Address Line 3',
        'line4' => 'Address Line 4',
        'city' => 'City',
        'county' => 'County',
        'postcode' => 'Postcode',
        'country' => 'Country',
    ];
    public $validation = [
        'first_name' => 'required|max:50|min:2',
        'last_name' => 'required|max:50|min:2',
        'email' => 'required|email|max:50|min:2',
        'phone' => 'required|max:50|min:2',
        'line1' => 'required|max:50|min:2',
        'line2' => 'required|max:50|min:2',
        'line3' => 'required|max:50|min:2',
        'line4' => 'required|max:50|min:2',
        'city' => 'required|max:50|min:2',
        'county' => 'required|max:50|min:2',
        'postcode' => 'required|max:50|min:2',
        'country' => 'required|max:50|min:2',
    ];

    public function name(){
        return $this->first_name . ' ' . $this->last_name;
    }

}
