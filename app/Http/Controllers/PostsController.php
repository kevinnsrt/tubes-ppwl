<?php

namespace App\Http\Controllers;

use App\Models\Postingan;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postingan = Postingan::paginate(5); 
        return view('home', compact('postingan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        // $validatedData = $request->validate([
        //     'id_barang' => 'required|max:255',
        //     'harga' => 'required|max:255',
        //     'deskrpisi' => 'required|max:255'
        // ]);

        Postingan::create($request->all());

        return redirect('/add')->with('success','Postingan Telah Berhasil');

        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $akun= Postingan::paginate(5);
        return view('users',compact('akun') );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    
     public function destroy($id)
     {
         $postingan = Postingan::findOrFail($id);
         $postingan->delete();
         return redirect('/home')->with('success', 'Postingan berhasil dihapus');
     }

}

