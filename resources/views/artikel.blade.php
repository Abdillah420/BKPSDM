<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artikel - BKPSDM Kabupaten Mojokerto</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('components.navbar')
    
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Artikel BKPSDM</h1>
        
        <!-- Tampilkan daftar artikel -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($artikels as $artikel)
                <div class="border rounded-lg overflow-hidden shadow-lg p-4">
                    <h2 class="font-bold text-lg">{{ $artikel->title }}</h2>
                    <p class="text-gray-600">{{ Str::limit($artikel->isi, 100) }}</p>
                    <a href="{{ route('artikel.show', $artikel->slug) }}" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>
        
    </div>

    @include('components.footer')
</body>
</html> 