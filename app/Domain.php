<?php

namespace Panel;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;

class Domain extends Model
{
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function user(){
        return $this->belongsTo('Panel\User');
    }

    public function records(){
        return DigitalOcean::domainRecord()->getAll($this->name);
    }
}
