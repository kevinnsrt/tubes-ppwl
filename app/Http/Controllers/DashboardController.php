<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Postingan;
use App\Models\Pesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalPesanan = DB::table('pesanan')->count();
        $totalHarga = Postingan::sum('harga');
        $totalAkun = DB::table('postingan')->count();
        $dataPesanan = DB::table('pesanan')
    ->selectRaw("DATE(created_at) as date, COUNT(id_pesanan) as total_pesanan")
    ->whereYear('created_at', now()->year)
    ->groupBy("date")
    ->get();

    $chartDataPesanan = [];
    foreach ($dataPesanan as $data) {
    $date = Carbon::parse($data->date);
    $chartDataPesanan[] = [
    'x' => $date->format('d M'),
    'y' => $data->total_pesanan,
    ];
    }


        return view('dashboard',['totalAkun'=>$totalAkun,'totalHarga'=>$totalHarga,'totalPesanan'=>$totalPesanan,
        'chartDataPesanan'=>$chartDataPesanan,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $pesanan = Pesanan::all();
        return view('pesanandetail',['pesanan'=>$pesanan]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {

    }
}
