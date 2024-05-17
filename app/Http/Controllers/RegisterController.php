<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view(('/register
        '),['register']);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255'
        ]);

        User::create($validatedData);

        // $request->session()->flash('success','Registrasi Berhasil! Silahkan Login');

        return redirect('/login')->with('success','Registrasi Berhasil! Silahkan Login');
    }
}
