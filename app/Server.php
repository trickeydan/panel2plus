<?php

namespace Panel;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'name',
        'main_ip'
    ];

    public static function listShared(){
        $servers = Server::whereShared(true)->get();
        $array = [];
        foreach($servers as $server){
            $array[$server->main_ip] = $server->name;
        }
        return $array;
    }

    public static function listSharedCommaList(){
        $array = Server::listShared();
        $str = '';
        foreach($array as $ip => $s){
            $str .= $ip . ',';
        }
        return $str;
    }

    public static function getStringFromIP($ip){
        $servers = Server::whereMainIp($ip);
        if($servers->count() != 0){
            return $servers->first()->name;
        }else{
            return $ip;
        }
    }
}
