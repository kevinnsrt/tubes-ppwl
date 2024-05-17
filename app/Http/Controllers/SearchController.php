<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        dd(request('search'));

        // $search = Post::latest(){
        //     $search->where()
        // }
    }
    
}
