<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'CRM Telur Puyuh')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    <nav class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
        <span class="font-bold">CRM Telur Puyuh</span>

        <div class="flex items-center gap-6">
            <a href="{{ route('dashboard') }}" class="hover:underline {{ request()->routeIs('dashboard') ? 'font-bold underline' : '' }}">Dashboard</a>
            <a href="{{ route('pelanggan.index') }}" class="hover:underline {{ request()->routeIs('pelanggan.*') ? 'font-bold underline' : '' }}">Pelanggan</a>
            <a href="{{ route('produk.index') }}" class="hover:underline {{ request()->routeIs('produk.*') ? 'font-bold underline' : '' }}">Produk</a>
            <a href="{{ route('pesanan.index') }}" class="hover:underline {{ request()->routeIs('pesanan.*') ? 'font-bold underline' : '' }}">Pesanan</a>

            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="bg-red-600 px-3 py-1 rounded hover:bg-red-700 text-sm">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <main class="p-8">
        @yield('content')
    </main>

</body>

</html>