@extends('layouts.app')

@section('title', 'Tambah Pelanggan - CRM Telur Puyuh')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Pelanggan</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">
    <form method="POST" action="{{ route('pelanggan.store') }}">
        @include('pelanggan._form')
    </form>
</div>
@endsection