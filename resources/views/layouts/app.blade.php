<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Kreatif')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-900 via-blue-900 to-indigo-900 min-h-screen text-white">
    <nav class="p-6 bg-black/20 backdrop-blur-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-pink-400 to-yellow-400">
                ✨ KreatifKu
            </a>
            <div class="space-x-6">
                <a href="/" class="hover:text-pink-400 transition">Beranda</a>
                <a href="/projects" class="hover:text-pink-400 transition">Proyek</a>
                <a href="/projects/create" class="px-4 py-2 bg-pink-500 rounded-full hover:bg-pink-600 transition">
                    + Buat Proyek
                </a>
            </div>
        </div>
    </nav>
    
    <main class="container mx-auto p-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-500/20 border border-green-400 rounded-lg text-green-300">
                {{ session('success') }}
            </div>
        @endif
        
        @yield('content')
    </main>
</body>
</html>