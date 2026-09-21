@extends('layouts.app')

@section('title', 'Tambah Pesanan - CRM Telur Puyuh')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Pesanan</h1>

<div class="bg-white p-6 rounded shadow max-w-2xl">
    <form method="POST" action="{{ route('pesanan.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Pelanggan</label>
            <select name="pelanggan_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih Pelanggan --</option>
                @foreach ($pelanggan as $item)
                <option value="{{ $item->id }}" {{ old('pelanggan_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->nama }}
                </option>
                @endforeach
            </select>
            @error('pelanggan_id')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium mb-1">Tanggal</label>
            <input type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}"
                class="w-full border rounded px-3 py-2">
            @error('tanggal')
            <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <label class="block text-sm font-medium mb-2">Produk Dipesan</label>

        <div id="produk-container">
            <div class="produk-row flex gap-2 mb-2">
                <select name="produk_id[]" class="flex-1 border rounded px-3 py-2">
                    <option value="">-- Pilih Produk --</option>
                    @foreach ($produk as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }} (Rp {{ number_format($item->harga, 0, ',', '.') }})</option>
                    @endforeach
                </select>
                <input type="number" name="jumlah[]" min="1" placeholder="Jumlah"
                    class="w-28 border rounded px-3 py-2">
                <button type="button" class="remove-row bg-red-100 text-red-600 px-3 rounded hover:bg-red-200">
                    Hapus
                </button>
            </div>
        </div>

        <button type="button" id="tambah-produk"
            class="text-blue-600 text-sm hover:underline mb-6">
            + Tambah Produk
        </button>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
            <a href="{{ route('pesanan.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
    document.getElementById('tambah-produk').addEventListener('click', function() {
        const container = document.getElementById('produk-container');
        const rows = container.getElementsByClassName('produk-row');
        const newRow = rows[0].cloneNode(true);

        newRow.querySelectorAll('select, input').forEach(function(el) {
            el.value = '';
        });

        container.appendChild(newRow);
    });

    document.getElementById('produk-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            const rows = document.getElementsByClassName('produk-row');
            if (rows.length > 1) {
                e.target.closest('.produk-row').remove();
            }
        }
    });
</script>
@endsection