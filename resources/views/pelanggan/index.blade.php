@extends('layouts.app')

@section('title', 'Data Pelanggan - CRM Telur Puyuh')

@section('content')
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Data Pelanggan</h1>
    <a href="{{ route('pelanggan.create') }}"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        + Tambah Pelanggan
    </a>
</div>

@if (session('success'))
<div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
    {{ session('success') }}
</div>
@endif

<table class="w-full bg-white rounded shadow">
    <thead>
        <tr class="bg-gray-200 text-left">
            <th class="p-3">Nama</th>
            <th class="p-3">Kontak</th>
            <th class="p-3">Alamat</th>
            <th class="p-3 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pelanggan as $item)
        <tr class="border-t">
            <td class="p-3">{{ $item->nama }}</td>
            <td class="p-3">{{ $item->kontak }}</td>
            <td class="p-3">{{ $item->alamat ?? '-' }}</td>
            <td class="p-3 text-center space-x-2">
                <a href="{{ route('pelanggan.edit', $item->id) }}"
                    class="text-blue-600 hover:underline">Edit</a>

                <form action="{{ route('pelanggan.destroy', $item->id) }}"
                    method="POST" class="inline"
                    onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="p-3 text-center text-gray-500">Belum ada data pelanggan.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection