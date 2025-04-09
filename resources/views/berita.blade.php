<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita - BKPSDM Kabupaten Mojokerto</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('components.navbar')
    <a href="/" class="flex items-center bg navbar bg-[#800000] w-full px-4 md:px-12 h-16">
        <img src="{{ asset('asset/image/Logo mojokerto.png') }}" alt="Logo" class="h-10 mr-2">
        <h1 class="text-lg md:text-xl font-bold text-white">BKPSDM</h1>
    </a>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Berita BKPSDM</h1>
        
        <!-- Menampilkan semua berita -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($beritas as $berita)
                <div class="bg-white rounded-lg shadow-md p-4">
                    <img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" class="mb-4 rounded-lg">
                    <h2 class="text-xl font-semibold mb-2">{{ $berita->title }}</h2>
                    <p class="text-gray-600 mb-4">{{ Str::limit($berita->isi, 100) }}</p>
                    <a href="{{ route('berita.show', $berita->slug) }}" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>
        
    </div>

    @include('components.footer')

</body>
</html> 
