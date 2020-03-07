<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function login(Request $request)
    {
        $credentials=$this->validate($request,[
            $this->username()=>'required|string',
            'password'=>'required|string'
        ]);



       if(Auth::attempt($credentials)){
           return redirect('/notebooks');
       }else{
        return redirect('/');
       }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'national_id';
    }

}
