<?php

namespace Panel;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Panel\Managers\ZipBookManager;
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

    private $name;
    private $email;
    private $phone;
    private $address_1;
    private $address_2;
    private $city;
    private $state;
    private $postal_code;

    private $zb_update = [];

    public $fields = [
        'name' => [
            'title' => 'Name',
            'validation' => 'required|max:50|min:2',
            'location' => 'both',
        ],
        'email' => [
            'title'  => 'Email',
            'validation' => 'required|max:50|min:2',
            'location' => 'zb',
        ],
        'phone'  => [
            'title'  => 'Phone Number',
            'validation' => 'required|max:50|min:2',
            'location' => 'zb',
        ],
        'address_1'  => [
            'title'  => 'Address Line 1',
            'validation' => 'required|max:50|min:2',
            'location' => 'zb',
        ],
        'address_2'  => [
            'title'  => 'Address Line 2',
            'validation' => 'max:50|min:2',
            'location' => 'zb',
        ],
        'city'  => [
            'title'  => 'City',
            'validation' => 'required|max:50|min:2',
            'location' => 'zb',
        ],
        'state'  => [
            'title'  => 'County',
            'validation' => 'required|max:50|min:2',
            'location' => 'zb',
        ],
        'postal_code'  => [
            'title'  => 'Postcode',
            'validation' => 'required|max:50|min:2',
            'location' => 'zb',
        ],
    ];

    public function __get($key)
    {
        if(isset($this->fields[$key]) && $this->fields[$key]['location'] == 'zb'){
            return $this->getFromZB($key);
        }else{
            return $this->getAttribute($key);
        }
    }

    public function __set($key, $value)
    {
        if(!isset($this->fields[$key]) || (isset($this->fields[$key]) && $this->fields[$key]['location'] != 'zb')){
            $this->setAttribute($key, $value);
        }
        if(isset($this->fields[$key]) && $this->fields[$key]['location'] != 'local'){
            $this->setToZB($key,$value);
        }


    }

    public function getFromZB($key){
        if(!isset($this->zb)){
            $zb = new ZipBookManager();
            $this->zb = $zb->getClient($this->zb_id);
        }
        if(isset($this->zb->$key)) return $this->zb->$key;
    }

    public function setToZB($key,$value){
        $this->zb_update[$key] = $value;
    }
    public function saveZB(){
        $zb = new ZipBookManager();
        $res = $zb->setClient($this->zb_id,$this->zb_update);
        $this->zb_update = [];
        return $res;
    }

    public function save(array $options = [])
    {
        $this->saveZB();
        return parent::save($options);
    }

    public function domains(){
        return $this->hasMany('Panel\Domain','user_id','id');
    }

    // Get Permissions

    public function hasDNS(){
        return true;
    }

}
