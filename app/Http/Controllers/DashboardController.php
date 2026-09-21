<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Produk;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $totalProduk = Produk::count();
        $totalPesanan = Pesanan::count();
        $pesananBulanIni = Pesanan::whereMonth('tanggal', Carbon::now()->month)
            ->whereYear('tanggal', Carbon::now()->year)
            ->count();

        return view('dashboard', compact(
            'totalPelanggan',
            'totalProduk',
            'totalPesanan',
            'pesananBulanIni'
        ));
    }
}
