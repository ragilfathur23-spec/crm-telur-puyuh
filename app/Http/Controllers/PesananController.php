<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPesanan;
use App\Models\Pelanggan;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with('pelanggan')->latest()->get();

        return view('pesanan.index', compact('pesanan')); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //    
        $pelanggan = Pelanggan::all();
        $produk = Produk::all();

        return view('pesanan.create', compact('pelanggan', 'produk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'tanggal' => 'required|date',
            'produk_id' => 'required|array|min:1',
            'produk_id.*' => 'required|exists:produk,id',
            'jumlah' => 'required|array|min:1',
            'jumlah.*' => 'required|integer|min:1',
        ]);

        DB::transaction(function () use ($validated) {
            $totalHarga = 0;

            $pesanan = Pesanan::create([
                'pelanggan_id' => $validated['pelanggan_id'],
                'tanggal' => $validated['tanggal'],
                'total_harga' => 0,
            ]);

            foreach ($validated['produk_id'] as $index => $produkId) {
                $produk = Produk::findOrFail($produkId);
                $jumlah = $validated['jumlah'][$index];
                $subtotal = $produk->harga * $jumlah;

                DetailPesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $produkId,
                    'jumlah' => $jumlah,
                    'subtotal' => $subtotal,
                ]);

                $totalHarga += $subtotal;
            }

            $pesanan->update(['total_harga' => $totalHarga]);
        });

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pesanan = Pesanan::with(['pelanggan', 'detailPesanan.produk'])->findOrFail($id);

        return view('pesanan.show', compact('pesanan'));
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
    public function destroy(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->delete();

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dihapus.');
    }
}
