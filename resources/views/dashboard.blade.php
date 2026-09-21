@extends('layouts.app')

@section('title', 'Dashboard - CRM Telur Puyuh')

@section('content')
<h1 class="text-2xl font-bold mb-6">Dashboard</h1>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Pelanggan</p>
        <p class="text-3xl font-bold mt-1">{{ $totalPelanggan }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Produk</p>
        <p class="text-3xl font-bold mt-1">{{ $totalProduk }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Total Pesanan</p>
        <p class="text-3xl font-bold mt-1">{{ $totalPesanan }}</p>
    </div>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-gray-500 text-sm">Pesanan Bulan Ini</p>
        <p class="text-3xl font-bold mt-1">{{ $pesananBulanIni }}</p>
    </div>
</div>
@endsection