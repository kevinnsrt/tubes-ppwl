<?php

namespace App\Http\Controllers;
use App\Models\Postingan;
use Illuminate\Support\Facades\Storage;
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
    public function store(Request $request)
{
    // Validasi data request termasuk gambar
    $validatedData = $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif',
        'harga'=>'required|max:255',
        'deskripsi'=>'required'
    ]);

    // Cek apakah file gambar ada dalam request
    if ($request->hasFile('gambar')) {
        // Simpan gambar dan dapatkan path-nya di disk 'public'
        $path = $request->file('gambar')->store('post-images', 'public');

        // Tambahkan path gambar ke data request yang sudah divalidasi
        $validatedData['gambar'] = $path;
    } else {
        // Tangani kasus di mana gambar tidak ada
        return redirect()->back()->with('error', 'Gambar diperlukan.');
    }

    // Buat postingan dengan data yang telah divalidasi
    Postingan::create($validatedData);

    // Arahkan ke halaman utama dengan pesan sukses
    return redirect('/home')->with('success', 'Postingan berhasil dibuat');
}



    /**
     * Display the specified resource.
     */
    public function show()
    {
        $akun = Postingan::paginate(5);
        return view('users', compact('akun'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $postingan = Postingan::findOrFail($id);
        return view('add.edit', compact('postingan'));
    }

    /**
     * Update the specified resource in storage.
     */


public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        'harga' => 'required|max:255',
        'deskripsi' => 'required'
    ]);

    $postingan = Postingan::findOrFail($id);

    if ($request->hasFile('gambar')) {
        if ($postingan->gambar) {
            // Hapus gambar lama
            Storage::delete('public/' . $postingan->gambar);
        }

        // Simpan gambar baru
        $path = $request->file('gambar')->store('post-images', 'public');
        $validatedData['gambar'] = $path;
    }

    $postingan->update([
        'harga' => $validatedData['harga'],
        'deskripsi' => $validatedData['deskripsi'],
        'gambar'=> $validatedData['gambar']
    ]);

    return redirect('/home')->with('success', 'Postingan berhasil diperbarui');
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

    public function detail($id)
{
    $postingan = Postingan::findOrFail($id); // Pastikan model postingan Anda adalah 'Postingan'
    return view('viewAdmin', compact('postingan'));
}

public function detailpostingan($id)
{
    $postingan = Postingan::findOrFail($id); // Pastikan model postingan Anda adalah 'Postingan'
    return view('viewUser', compact('postingan'));
}



}

