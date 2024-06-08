<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postingan;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query builder untuk Postingan, disorting berdasarkan tanggal terbaru
        $postingan = Postingan::latest();

        // Cek apakah ada parameter pencarian
        if ($request->has('search')) {
            // Lakukan pencarian berdasarkan kolom 'id', 'harga', dan 'deskripsi'
            $searchQuery = '%' . $request->input('search') . '%';
            $postingan->where(function ($query) use ($searchQuery) {
                $query->where('id_postingan', 'like', $searchQuery)
                      ->orWhere('harga', 'like', $searchQuery)
                      ->orWhere('deskripsi', 'like', $searchQuery)
                      ->orWhere('judul','like',$searchQuery);
            });
        }

        // Ambil hasil query dan kirimkan ke view 'home' bersama dengan data pencarian
        $results = $postingan->get();

        return view('home', [
            'postingan' => $results,
            'search' => $request->input('search'),
        ]);
    }

    public function show(Request $request)
{
    // Ambil query builder untuk Postingan, disorting berdasarkan tanggal terbaru
    $akun = Postingan::latest();

    // Cek apakah ada parameter pencarian
    if ($request->has('search')) {
        // Lakukan pencarian berdasarkan kolom 'id', 'harga', dan 'deskripsi'
        $searchQuery = '%' . $request->input('search') . '%';
        $akun->where(function ($query) use ($searchQuery) {
            $query->where('id_postingan', 'like', $searchQuery)
                  ->orWhere('harga', 'like', $searchQuery)
                  ->orWhere('deskripsi', 'like', $searchQuery)
                    ->orWhere('judul','like',$searchQuery);
        });
    }

    // Ambil hasil query dan kirimkan ke view 'users' bersama dengan data pencarian
    $results = $akun->get();

    return view('account', [
        'akun' => $results, // Mengubah 'postingan' menjadi 'akun'
        'search' => $request->input('search'),
    ]);
}

}
