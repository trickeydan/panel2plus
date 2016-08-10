<?php

namespace Panel\Http\Controllers\DNS;

use GrahamCampbell\DigitalOcean\Facades\DigitalOcean;
use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Http\Controllers\Controller;
use Panel\Domain;

class RecordController extends Controller
{
    public function newRecord(Domain $domain){
        return view('pages.dns.records.new',[
            'domain' => $domain
        ]);
    }

    public function newRecordPost(Domain $domain,Request $request,DigitalOceanManager $do){
        $this->validate($request,[
            'type' => 'required|in:a,cname,mx,txt',
            'field1' => 'required',
            'field2' => 'required',
        ]);

        switch($request->type){
            case 'a':
                $this->validate($request,[
                    'field2' => 'ip',
                ],['field2.ip' => 'That is not a valid IP address.']);
            case 'cname':
            case 'txt':
                try{
                    $do->domainRecord()->create($domain->name,$request->type,$request->field1,$request->field2);
                }catch (\Exception $e){
                    return redirect(route('dns.domain.record.new',$domain))->withErrors($e->getMessage());
                }

                return redirect(route('dns.domain',$domain))->with('status','Record Added.');
                break;
            case 'mx':
                $this->validate($request,[
                    'field2' => 'integer',
                ],['field2.integer' => 'The priority needs to be a number']);
                try{
                    $do->domainRecord()->create($domain->name,'MX',null,$request->field1,$request->field2);
                }catch (\Exception $e){
                    return redirect(route('dns.domain.record.new',$domain))->withErrors($e->getMessage());
                }

                return redirect(route('dns.domain',$domain))->with('status','Record Added.');
                break;
        }

        return redirect(route('dns.domain.record.new',$domain))->withErrors('An unknown error occured. Please try again');
    }


    public function delete(Domain $domain, $record){
        DigitalOcean::domainRecord()->delete($domain->name,$record);
        return redirect(route('dns.domain',$domain))->with('status','Record Deleted.');
    }
}
