<?php

namespace Panel\Http\Controllers\DNS;

use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Http\Controllers\Controller;
use GrahamCampbell\DigitalOcean\DigitalOceanManager;
use Panel\Domain;

class DomainController extends Controller
{
    public function index(DigitalOceanManager $do){

        return view('pages.dns.index',[
            'domains' => $do->domain()->getAll(),
        ]);
    }

    public function domain(Domain $domain){

        return view('pages.dns.domain',compact('domain'));
    }
}
