<?php

namespace Panel\Http\Controllers\DNS;

use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Http\Controllers\Controller;
use GrahamCampbell\DigitalOcean\DigitalOceanManager;
use Panel\Domain;
use Illuminate\Support\Facades\Auth;
use Panel\Server;

class DomainController extends Controller
{
    public function index(DigitalOceanManager $do){

        return view('pages.dns.index',[
            'domains' => $do->domain()->getAll(),
        ]);
    }

    public function domain(Domain $domain){
        if($domain->user_id == Auth::User()->id){
            return view('pages.dns.domain',compact('domain'));
        }else{
            abort(403);
        }

    }

    public function create(){
        return view('pages.dns.create');
    }

    public function createPost(DigitalOceanManager $do, Request $request){
        $in = Server::listSharedCommaList() . 'custom';
        //dd($in);
        $this->validate($request,[
            'name' => 'required',
            'ipselect' => 'required|in:' . $in,
            'ip' => 'ip',
        ]);
        if($request->ipselect == 'custom'){
            if($request->ip == "") return redirect(route('dns.create'))->withErrors('You need to provide an IP');
            return Domain::add($request->name,$request->ip);
        }
        return Domain::add($request->name,$request->ipselect);
    }

    public function domainDelete(Domain $domain){
        $domain->delete();
        return redirect(route('dns.index'))->with('status','Domain Deleted');
    }
}
