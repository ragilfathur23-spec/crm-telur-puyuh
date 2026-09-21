@extends('layouts.app')

@section('title', 'Detail Pesanan - CRM Telur Puyuh')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Detail Pesanan</h1>
    <a href="{{ route('pesanan.index') }}" class="text-blue-600 hover:underline">
        &larr; Kembali ke Daftar
    </a>
</div>

<div class="bg-white p-6 rounded shadow mb-6">
    <p><span class="font-medium">Pelanggan:</span> {{ $pesanan->pelanggan->nama }}</p>
    <p><span class="font-medium">Tanggal:</span> {{ $pesanan->tanggal }}</p>
    <p><span class="font-medium">Total Harga:</span> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
</div>

<h2 class="text-lg font-bold mb-2">Rincian Produk</h2>

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3">Produk</th>
            <th class="p-3">Jumlah</th>
            <th class="p-3">Subtotal</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesanan->detailPesanan as $detail)
        <tr class="border-t">
            <td class="p-3">{{ $detail->produk->nama }}</td>
            <td class="p-3">{{ $detail->jumlah }}</td>
            <td class="p-3">Rp {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection