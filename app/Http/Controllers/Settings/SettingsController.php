<?php

namespace Panel\Http\Controllers\Settings;

use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index(){
        return view('pages.settings.index');
    }
}
