<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BKPSDM Kabupaten Mojokerto</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Gelasio:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-image: url('{{ asset('asset/image/bg1.png') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            min-height: 100vh;
        }

        .slider-container {
            width: 100%;
            height: 350px;
            overflow: hidden;
            position: relative;
            margin-bottom: 2rem;
        }

        .slider {
            display: flex;
            height: 100%;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            min-width: 100%;
            flex: 0 0 100%;
            position: relative;
        }

        .slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .slide-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 1rem;
        }
    </style>
</head>
<body>
    @include('components.navbar')
    
    <div class="max-w-7xl mx-auto">
        <!-- Auth Links -->
        <nav class="flex justify-end space-x-4 py-4 px-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" 
                       class="text-white hover:text-gray-300 transition-colors">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" 
                       class="text-white hover:text-gray-300 transition-colors">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}" 
                           class="text-white hover:text-gray-300 transition-colors">
                            Register
                        </a> --}}
                    @endif
                @endauth
            @endif
        </nav>

        <main class="mt-8 px-4">
            <!-- Header with Logo -->
            <div class="text-center mb-12 w-full">
                <img src="{{ asset('asset/image/Logo mojokerto.png') }}" 
                     alt="Logo BKPSDM" 
                     class="mx-auto mb-4 object-contain"
                     style="width: 110px; height: 110px;">
                <div class="w-full py-4">
                    <h1 class="text-white font-black italic" 
                        style="font-size: 38px; 
                               font-weight: 900; 
                               letter-spacing: 0.05em; 
                               -webkit-text-stroke: 1.5px white;
                               text-shadow: 
                                   -1px -1px 0 #fff,
                                    1px -1px 0 #fff,
                                   -1px 1px 0 #fff,
                                    1px 1px 0 #fff;
                               font-style: italic;">
                        BKPSDM KABUPATEN MOJOKERTO
                    </h1>
                </div>
            </div>

            <!-- Slider -->
            <div class="slider-container">
                <div class="slider">
                    @foreach ($slides as $slide)
                        <div class="slide">
                            <img src="{{ Storage::url($slide->path) }}" 
                                 alt="{{ $slide->title }}"
                                 draggable="false">
                            <div class="slide-content">
                                <h2 class="text-lg font-semibold">{{ $slide->title }}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Features Section -->
        </main>
    </div>
    <div class="max-w-7xl mx-auto">
        <div class="container mx-auto px-4 mt-8">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-white">FITUR</h2>
            </div>

            <!-- Baris Pertama -->
            <div class="flex justify-center gap-4 mb-4">
                <!-- BRANDA -->
                <div class="w-64">
                    <a href="#" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-home text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">BRANDA</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Halaman Utama BKPSDM</p>
                        </div>
                    </a>
                </div>

                <!-- PROFIL -->
                <div class="w-64">
                    <a href="{{ route('profil') }}" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-user text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">PROFIL</h3>
                            </div>
                            <p class="text-gray-600 text-sm">VISI MISI - Tugas Pokok - Struktur</p>
                        </div>
                    </a>
                </div>

                <!-- BERITA -->
                <div class="w-64">
                    <a href="{{ route('berita') }}" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-newspaper text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">BERITA</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Berita Terbaru BKPSDM</p>
                        </div>
                    </a>
                </div>

                <!-- UNDUH -->
                <div class="w-64">
                    <a href="{{ route('unduh') }}" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-download text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">UNDUH</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Dokumen dan Laporan Kinerja</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Baris Kedua -->
            <div class="flex justify-center gap-4">
                <!-- GALERI -->
                <div class="w-64">
                    <a href="{{ route('galeri') }}" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-images text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">GALERI</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Foto dan Video Kegiatan</p>
                        </div>
                    </a>
                </div>

                <!-- ARTIKEL -->
                <div class="w-64">
                    <a href="{{ route('artikel') }}" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-file-alt text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">ARTIKEL</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Artikel Terbaru BKPSDM</p>
                        </div>
                    </a>
                </div>

                <!-- KONTAK -->
                <div class="w-64">
                    <a href="{{ route('kontak') }}" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-envelope text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">KONTAK</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Informasi Kontak dan Lokasi</p>
                        </div>
                    </a>
                </div>

                <!-- LOGIN -->
                <div class="w-64">
                    <a href="#" class="block bg-white rounded-lg p-6 text-center hover:shadow-lg transition-all duration-300 h-64">
                        <div class="flex flex-col items-center justify-between h-full">
                            <div class="flex flex-col items-center">
                                <i class="fas fa-sign-in-alt text-4xl text-blue-700 mb-4"></i>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">LOGIN</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Absensi Pegawai via Android</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto">
        <h1 style="height: 200px">ini footer</h1>
    </div>
    @include('components.footer')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const slider = document.querySelector('.slider');
            const slides = document.querySelectorAll('.slide');
            let currentSlide = 0;
            const totalSlides = slides.length;

            if (totalSlides === 0) return;

            function updateSlider() {
                slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            }

            updateSlider();
            setInterval(nextSlide, 2000);
        });
    </script>
</body>
</html>