@extends('layouts.app')

@section('title', 'Tambah Produk - CRM Telur Puyuh')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Produk</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">
    <form method="POST" action="{{ route('produk.store') }}">
        @include('produk._form')
    </form>
</div>
@endsection