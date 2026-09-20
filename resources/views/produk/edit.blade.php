@extends('layouts.app')

@section('title', 'Edit Produk - CRM Telur Puyuh')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Produk</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">
    <form method="POST" action="{{ route('produk.update', $produk->id) }}">
        @method('PUT')
        @include('produk._form')
    </form>
</div>
@endsection