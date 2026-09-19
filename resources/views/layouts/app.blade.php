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

        <div class="flex items-center gap-4">
            <a href="/dashboard" class="hover:underline">Dashboard</a>
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