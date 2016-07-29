<?php

namespace Panel\Http\Controllers\Settings;

use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function form(){
        return view('pages.settings.updatedetails');
    }

    public function post(Request $request){
        $user = Auth::User();
        $this->validate($request,$user->validation);
        foreach($user->fields as $field => $name){
            $user->$field = $request->$field;
        }
        $user->save();
        return redirect(route('settings.index'))->with('status','Profile updated.');
    }
}
