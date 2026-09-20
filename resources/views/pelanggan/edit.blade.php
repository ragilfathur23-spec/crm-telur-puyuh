@extends('layouts.app')

@section('title', 'Edit Pelanggan - CRM Telur Puyuh')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Pelanggan</h1>

<div class="bg-white p-6 rounded shadow max-w-lg">
    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
        @method('PUT')
        @include('pelanggan._form')
    </form>
</div>
@endsection