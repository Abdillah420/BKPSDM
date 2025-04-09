<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Unduh - BKPSDM Kabupaten Mojokerto</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('components.navbar')
    <a href="/" class="flex items-center bg navbar bg-[#800000] py-4 px-4 md:px-64 flex items-center " >
        <img src="{{ asset('asset/image/Logo mojokerto.png') }}" alt="Logo" class="h-10 mr-2">
        <h1 class="text-lg md:text-xl font-bold text-white">BKPSDM</h1>
    </a>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-6">Unduh Dokumen</h1>
        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Unduh</th>
                </tr>
            </thead>
            <tbody>
                @foreach($beritas as $berita)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $berita->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('berita.show', $berita->slug) }}" class="text-blue-500 hover:underline">Lihat</a>
                            <a href="{{ route('berita.download', $berita->slug) }}" class="text-green-500 hover:underline ml-2">Unduh PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>

    @include('components.footer')
</body>
</html> 