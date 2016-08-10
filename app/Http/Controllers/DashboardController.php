<?php

namespace Panel\Http\Controllers;

use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Managers\ZipBookManager;

class DashboardController extends Controller
{
    public function dashboard(){
        $zb = new ZipBookManager();
        return view('pages.dashboard');
    }
}
