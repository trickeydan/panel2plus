<?php

namespace Panel\Http\Controllers;

use Illuminate\Http\Request;

use Panel\Http\Requests;

class DashboardController extends Controller
{
    public function dashboard(){
        return 'Dashboard';
    }
}
