<?php

namespace Panel\Http\Controllers\Settings;

use Illuminate\Http\Request;

use Panel\Http\Requests;
use Panel\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PasswordController extends Controller
{
    public function form(){
        return view('pages.settings.changepassword');
    }

    public function post(Request $request){
        $this->validate($request,[
            'oldpassword' => 'required|pwdcorrect',
            'password' => 'required|confirmed|min:8|max:50'
        ]);
        if($request->oldpassword == $request->password) return redirect(route('settings.changepassword'))->withErrors('Your new password must be different.');

        $user = Auth::User();
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect(route('settings.index'))->with('status','Password Changed');
    }
}
