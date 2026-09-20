@csrf

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $pelanggan->nama ?? '') }}"
        class="w-full border rounded px-3 py-2">
    @error('nama')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-4">
    <label class="block text-sm font-medium mb-1">Kontak</label>
    <input type="text" name="kontak" value="{{ old('kontak', $pelanggan->kontak ?? '') }}"
        class="w-full border rounded px-3 py-2">
    @error('kontak')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="mb-6">
    <label class="block text-sm font-medium mb-1">Alamat</label>
    <textarea name="alamat" rows="3"
        class="w-full border rounded px-3 py-2">{{ old('alamat', $pelanggan->alamat ?? '') }}</textarea>
    @error('alamat')
    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="flex gap-2">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Simpan
    </button>
    <a href="{{ route('pelanggan.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">
        Batal
    </a>
</div>