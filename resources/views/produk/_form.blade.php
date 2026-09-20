@csrf

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">Nama Produk</label>
    <input type="text" name="nama" value="{{ old('nama', $produk->nama ?? '') }}"
        class="w-full border rounded px-3 py-2">
    @error('nama')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label class="block text-sm font-medium mb-1">Harga (Rp)</label>
    <input type="number" name="harga" min="0" value="{{ old('harga', $produk->harga ?? '') }}"
        class="w-full border rounded px-3 py-2">
    @error('harga')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex gap-2">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan
    </button>
    <a href="{{ route('produk.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
        Batal
    </a>
</div>