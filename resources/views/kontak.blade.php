<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak - BKPSDM Kabupaten Mojokerto</title>
    
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
        <h1 class="text-3xl font-bold mb-6">Kontak BKPSDM</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Informasi Kontak -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Informasi Kontak</h2>
                <div class="space-y-4">
                    <p class="flex items-center">
                        <i class="fas fa-map-marker-alt w-6 text-blue-600"></i>
                        <span>Jl. R.A. Basuni No. 21, Mojokerto</span>
                    </p>
                    <p class="flex items-center">
                        <i class="fas fa-phone w-6 text-blue-600"></i>
                        <span>(021) 123-4567</span>
                    </p>
                    <p class="flex items-center">
                        <i class="fas fa-envelope w-6 text-blue-600"></i>
                        <span>info@bkpsdm-mojokerto.go.id</span>
                    </p>
                    <p class="flex items-center">
                        <i class="fas fa-clock w-6 text-blue-600"></i>
                        <span>Senin - Jumat: 08:00 - 16:00</span>
                    </p>
                </div>
            </div>

            <!-- Form Kontak -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Kirim Pesan</h2>
                <form class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-2">Nama Lengkap</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Email</label>
                        <input type="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Subjek</label>
                        <input type="text" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-2">Pesan</label>
                        <textarea rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:border-blue-500"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Peta Lokasi -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Lokasi Kami</h2>
            <div class="aspect-video bg-gray-200 rounded-lg">
                <!-- Di sini Anda bisa menambahkan peta menggunakan Google Maps atau peta lainnya -->
                <p class="text-center py-20">Peta akan ditampilkan di sini</p>
            </div>
        </div>
    </div>

    @include('components.footer')
</body>
</html> 