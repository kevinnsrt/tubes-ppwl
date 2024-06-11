<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Postingan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name'=>'required|min:3|max:255',
        'email'=>'required|email',
        'phone'=>'required',
        'id_postingan'=>'required|exists:postingan,id_postingan'

    ]);

    Pesanan::create($validatedData);
    return redirect('/account')->with('success', 'Postingan berhasil dibuat');
}

    /**
     * Display the specified resource.
     */
    public function show($id_postingan)
    {
        $pesanan = Postingan::findOrFail($id_postingan);
        return view('pesanan',['pesanan'=> $pesanan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
