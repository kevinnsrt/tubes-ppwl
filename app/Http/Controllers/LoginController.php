<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function authenticate(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('loginError','Login Gagal');



    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return response('logged out',401);
    }

}
