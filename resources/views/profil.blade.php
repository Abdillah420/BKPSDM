<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil - BKPSDM Kabupaten Mojokerto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('asset/image/Logo mojokerto.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/branda.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://fonts.googleapis.com/css2?family=Gelasio:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    @include('components.navbar')

    <div id="navbar" class="navbar bg-[#800000] py-4 px-4 md:px-12 flex items-center justify-between fixed left-0 right-0 z-50 transition-transform duration-300">
        <!-- Logo -->
        <a href="/" class="flex items-center">
            <img src="{{ asset('asset/image/Logo mojokerto.png') }}" alt="Logo" class="h-10 mr-2">
            <h1 class="text-lg md:text-xl font-bold text-white">BKPSDM</h1>
        </a>
        
        <!-- Menu Burger -->
        <div class="md:hidden flex items-center">
            <button id="menu-toggle" class="text-white focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>
        
        <!-- Navigation Links -->
        <div id="nav-links" class="hidden md:flex ml-auto flex-wrap space-x-4">
            <a href="#visi-misi" class="text-white hover:text-gray-300 transition duration-300 text-sm md:text-base">Visi Misi</a>
            <a href="#tugas-fungsi" class="text-white hover:text-gray-300 transition duration-300 text-sm md:text-base">Tugas & Fungsi</a>
            <a href="#struktur-organisasi" class="text-white hover:text-gray-300 transition duration-300 text-sm md:text-base">Struktur</a>
            <a href="#daftar-pegawai" class="text-white hover:text-gray-300 transition duration-300 text-sm md:text-base"> Daftar Pegawai</a>
        </div>
    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-[#800000] py-4 px-4">
        <a href="#visi-misi" class="block text-white hover:text-gray-300 transition duration-300 text-sm">Visi Misi</a>
        <a href="#tugas-fungsi" class="block text-white hover:text-gray-300 transition duration-300 text-sm">Tugas & Fungsi</a>
        <a href="#struktur-organisasi" class="block text-white hover:text-gray-300 transition duration-300 text-sm">Struktur</a>
        <a href="#daftar-pegawai" class="block text-white hover:text-gray-300 transition duration-300 text-sm">Pegawai</a>
    </div>

    <div class="profil-bg flex items-center justify-center text-white">
        <h1 class="text-4xl font-bold">PROFIL</h1>
    </div>
    

    <!-- Sections -->
    <section id="visi-misi" class="bg-transparent backdrop-blur-lg py-4 px-4 md:px-32">
        <div class="content-container bg-transparent">
            <div class="text-center pt-8 md:pt-12">
                <h2 class="text-xl md:text-2xl font-bold text-blue-900 mb-6 md:mb-8">VISI MISI</h2>
            </div>
            <div class="mb-6 md:mb-8">
                <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4">VISI</h3>
                <p class="text-sm md:text-base text-justify leading-relaxed">
                    "TERWUJUDNYA MASYARAKAT KABUPATEN MOJOKERTO YANG MANDIRI, SEJAHTERA, DAN BERMARTABAT MELALUI PENGUATAN DAN PENGEMBANGAN BASIS PEREKONOMIAN, PENDIDIKAN, SERTA KESEHATAN"
                </p>
            </div>
            <div>
                <h3 class="text-lg md:text-xl font-semibold mb-3 md:mb-4">MISI</h3>
                <p class="text-sm md:text-base text-justify leading-relaxed">
                    "TERWUJUDNYA MASYARAKAT KABUPATEN MOJOKERTO YANG MANDIRI, SEJAHTERA, DAN BERMARTABAT MELALUI PENGUATAN DAN PENGEMBANGAN BASIS PEREKONOMIAN, PENDIDIKAN, SERTA KESEHATAN"
                </p>
            </div>
        </div>
    </section>

    <section id="tugas-fungsi" class="bg-transparent backdrop-blur-lg py-4 px-4 md:px-32">
        <div class="text-center pt-8 md:pt-12">
            <h2 class="text-xl md:text-2xl font-bold text-blue-900 mb-6 md:mb-8">Tugas Pokok Dan Fungsi</h2>
        </div>

        <!-- Semua div menggunakan class yang sama untuk konsistensi -->
        <div class="space-y-6 md:space-y-8">
            <!-- SEKRETARIAT -->
            <div class="bg-white rounded-lg p-4 md:p-6">
                <h5 class="text-lg md:text-xl font-semibold text-black-900 mb-4 text-center">SEKRETARIAT</h5>
                <div class="space-y-4">
                    <p class="text-sm md:text-base text-gray-700">
                        1. Sekretariat mempunyai tugas membantu Kepala Badan dalam melaksanakan sebagian tugas Badan Kepegawaian, Pendidikan, dan Pelatihan untuk mengkoordinasikan bidang-bidang dan memberikan pelayanan administratif serta teknis yang meliputi urusan umum, kepegawaian, penyusunan program dan keuangan.
                    </p>
                    <p class="text-sm md:text-base text-gray-700">
                        2. Dalam melaksanakan tugas sebagaimana dimaksud pada ayat (1), Sekretariat mempunyai fungsi:
                    </p>
                    <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                        <li>Pelaksanaan koordinasi dan penyusunan rencana program, kegiatan dan anggaran;</li>
                        <li>Pelaksanaan pengelolaan dan pembinaan urusan administrasi umum, kepegawaian dan keuangan;</li>
                        <li>Pelaksanaan urusan ketatausahaan, kerumahtanggaan, tata laksana dan hubungan masyarakat;</li>
                        <li>Pelaksanaan koordinasi penataan organisasi;</li>
                        <li>Pelaksanaan dan koordinasi pengelolaan dan pengamanan aset;</li>
                        <li>Pengkoordinasian pelaksanaan tugas bidang-bidang dan UPT di lingkungan Badan;</li>
                        <li>Pelaksanaan evaluasi dan penyusunan laporan; dan</li>
                        <li>Pelaksanaan tugas-tugas kedinasan lain yang diberikan oleh Kepala Badan.</li>
                    </ol>
                </div>
            </div>

            <!-- Sub Bagian dan section lainnya menggunakan format yang sama -->
            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1. Sub Bagian Umum dan Kepegawaian mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Melakukan pengelolaan dan pembinaan urusan administrasi umum dan kepegawaian;</li>
                    <li>Melakukan pengelolaan surat menyurat, kearsipan, ketatalaksanaan, kerumahtanggaan, hubungan masyarakat dan keprotokolan;</li>
                    <li>Menyusun rencana kebutuhan, pengadaan, distribusi dan pemeliharaan perlengkapan dan peralatan kantor;</li>
                    <li>Menyusun bahan koordinasi di bidang administrasi umum dan kepegawaian;</li>
                    <li>Melakukan pengelolaan dan pengamanan aset;</li>
                    <li>Menyusun bahan koordinasi pelaksanaan tugas bidang-bidang dan UPT di lingkungan Badan di bidang administrasi umum dan kepegawaian;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Sekretaris.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2. Sub Bagian Penyusunan Program dan Keuangan mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun bahan koordinasi dan menyusun rencana kerja, rencana program, kegiatan dan anggaran keuangan;</li>
                    <li>Menyusun bahan koordinasi dan menyusun laporan kinerja;</li>
                    <li>Melakukan pengelolaan data dan perencanaan program;</li>
                    <li>Menyusun bahan koordinasi di bidang penyusunan program dan keuangan;</li>
                    <li>Melakukan pengelolaan dan pembinaan administrasi keuangan;</li>
                    <li>Melakukan evaluasi anggaran dan penggunaan keuangan;</li>
                    <li>Menyusun laporan keuangan;</li>
                    <li>Menyusun bahan koordinasi pelaksanaan tugas bidang-bidang dan UPT di lingkungan Badan di bidang penyusunan program dan keuangan;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Sekretaris.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <h5 class="text-lg md:text-xl font-semibold text-black-900 mb-4 text-center">BIDANG Pengembangan, PENDIDIKAN dan PELATIHAN</h5>
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1. Bidang Pengembangan, Pendidikan dan Pelatihan mempunyai tugas membantu Kepala Badan dalam melaksanakan sebagian tugas Badan Kepegawaian, Pendidikan dan Pelatihan meliputi perencanaan dan pengadaan Aparatur Sipil Negara (ASN), pendidikan dan pelatihan ASN serta pengembangan ASN.
                </p>
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2. Dalam melaksanakan tugas sebagaimana dimaksud pada ayat (1), Bidang Pengembangan, Pendidikan dan Pelatihan mempunyai fungsi :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Perumusan rencana program pengembangan, pendidikan dan pelatihan;</li>
                    <li>Perumusan perencanaan dan penetapan kebutuhan ASN;</li>
                    <li>Pelaksanaan pengadaan calon ASN;</li>
                    <li>Pelaksanaan pengangkatan dan penempatan calon ASN;</li>
                    <li>Perumusan perencanaan pengembangan serta pendidikan dan pelatihan ASN;</li>
                    <li>Pelaksanaan pengembangan serta pendidikan dan pelatihan ASN;</li>
                    <li>Perumusan program kesejahteraan ASN;</li>
                    <li>Pelaksanaan evaluasi dan penyusunan laporan; dan</li>
                    <li>Pelaksanaan tugas-tugas kedinasan lain yang diberikan oleh Kepala Badan.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1.Sub Bidang Perencanaan dan Pengadaan Aparatur Sipil Negara mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun rencana program perencanaan dan pengadaan ASN;</li>
                    <li>Melakukan analisa kebutuhan ASN;</li>
                    <li>Menyusun dan menetapkan kebutuhan ASN;</li>
                    <li>Melakukan pengadaan ASN;</li>
                    <li>Melakukan proses pengangkatan dan penempatan ASN;</li>
                    <li>Melakukan analisa kesenjangan jabatan;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Pengembangan, Pendidikan dan Pelatihan.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2.Sub Bidang Pendidikan dan Pelatihan Aparatur Sipil Negara mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun rencana program pendidikan dan pelatihan ASN;</li>
                    <li>Menyusun rencana dan melakukan seleksi peserta pendidikan dan pelatihan struktural;</li>
                    <li>Melakukan pengiriman peserta pendidikan dan pelatihan struktural, teknis dan fungsional;</li>
                    <li>Melakukan pendidikan dan pelatihan struktural, teknis dan fungsional;</li>
                    <li>Melakukan evaluasi dampak pendidikan dan pelatihan;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Pengembangan, Pendidikan dan Pelatihan.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    3.Sub Bidang Pengembangan Aparatur Sipil Negara mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun rencana program pengembangan dan kesejahteraan ASN;</li>
                    <li>Melakukan program pengembangan dan kesejahteraan aparatur;</li>
                    <li>Melakukan analisa kebutuhan pendidikan dan pelatihan;</li>
                    <li>Melakukan pengusulan penghargaan ASN;</li>
                    <li>Melakukan pengiriman peserta pendidikan dan pelatihan prajabatan;</li>
                    <li>Memproses tugas belajar dan izin belajar;</li>
                    <li>Melakukan ujian dinas;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Pengembangan, Pendidikan dan Pelatihan.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <h5 class="text-lg md:text-xl font-semibold text-black-900 mb-4 text-center">BIDANG MUTASI</h5>
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1.Bidang Mutasi mempunyai tugas membantu Kepala Badan dalam melaksanakan sebagian tugas Badan Kepegawaian,
                    Pendidikan dan Pelatihan meliputi mutasi jabatan dan perpindahan serta kepangkatan, pengangkatan dan pemberhentian.
                </p>
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2. Dalam melaksanakan tugas sebagaimana dimaksud pada ayat (1), Bidang Mutasi mempunyai fungsi :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Perumusan rencana program dan pelaksanaan mutasi ASN;</li>
                    <li>Pelaksanaan administrasi pemberhentian Pegawai Negeri Sipil (PNS) kecuali pemberhentian karena pelanggaran disiplin atau pelanggaran karena tindak pidana/penyelewengan dan pemutusan hubungan perjanjian kerja Pegawai Pemerintah dengan Perjanjian Kerja (P3K);</li>
                    <li>Pelaksanaan administrasi kepegawaian meliputi kenaikan pangkat, kenaikan gaji, impasing jabatan dan verifikasi Penilaian Angka Kredit Jabatan Fungsional Tertentu (PAK JFT);</li>
                    <li>Pelaksanaan peninjauan masa kerja PNS;</li>
                    <li>Pelaksanaan ujian kenaikan pangkat penyesuaian ijazah PNS;</li>
                    <li>Pelaksanaan evaluasi dan penyusunan laporan; dan</li>
                    <li>Pelaksanaan tugas-tugas kedinasan lain yang diberikan oleh Kepala Badan.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1. Sub Bidang Mutasi Jabatan dan Perpindahan mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun rencana program mutasi dan perpindahan;</li>
                    <li>Melakukan pengelolaan administrasi pemindahan PNS antar unit kerja/perangkat daerah/daerah/instansi;</li>
                    <li>Melakukan pengelolaan administrasi pengangkatan, pemindahan dan pemberhentian jabatan struktural dan jabatan fungsional tertentu;</li>
                    <li>Melakukan evaluasi jabatan struktural, jabatan fungsional umum dan jabatan fungsional tertentu;</li>
                    <li>Melakukan penyesuaian/impasing dalam jabatan PNS;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Mutasi.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2. Sub Bidang Kepangkatan, Pengangkatan dan Pemberhentian mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun program kepangkatan, pengangkatan dan pemberhentian;</li>
                    <li>Melakukan pengelolaan administrasi pengangkatan Calon Pegawai Negeri Sipil (CPNS) menjadi PNS;</li>
                    <li>Melakukan pengelolaan administrasi kepangkatan PNS;</li>
                    <li>Melakukan pengelolaan administrasi pemberhentian PNS kecuali pemberhentian karena pelanggaran disiplin atau pelanggaran karena tindak pidana/penyelewengan;</li>
                    <li>Melakukan pengelolaan administrasi pemutusan hubungan kerja P3K;</li>
                    <li>Melakukan verifikasi Penilaian PAK JFT dan kenaikan gaji PNS;</li>
                    <li>Melakukan ujian kenaikan pangkat dan penyesuaian ijazah PNS;</li>
                    <li>Melakukan pembekalan bagi PNS yang akan purna tugas;</li>
                    <li>Melakukan peninjauan masa kerja PNS;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Mutasi.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <h5 class="text-lg md:text-xl font-semibold text-black-900 mb-4 text-center">BIDANG Pembinaan, Informasi DAN DOKUMENTASI Kepegawaian</h5>
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1. Bidang Pembinaan, Informasi dan Dokumentasi Kepegawaian mempunyai tugas membantu Kepala Badan dalam melaksanakan sebagian tugas Badan Kepegawaian, 
                    Pendidikan dan Pelatihan meliputi pembinaan aparatur sipil negara, informasi dan dokumentasi kepegawaian.
                </p>
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2. Dalam melaksanakan tugas sebagaimana dimaksud pada ayat (1), Bidang Pembinaan, Informasi dan Dokumentasi Kepegawaian mempunyai fungsi :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Perumusan rencana program pembinaan aparatur, informasi dan dokumentasi kepegawaian;</li>
                    <li>Pelaksanaan pembinaan, pengawasan dan pengendalian disiplin ASN;</li>
                    <li>Pelaksanaan pengelolaan dan pengolahan data ASN;</li>
                    <li>Pelaksanaan pengelolaan Laporan Pajak-Pajak Pribadi (L2P2) dan Laporan Harta Kekayaan Aparatur Sipil Negara (LHKASN);</li>
                    <li>Pelaksanaan penyusunan dan pengembangan sistem informasi kepegawaian ASN;</li>
                    <li>Pelaksanaan pengelolaan dokumen dan tata naskah kepegawaian ASN;</li>
                    <li>Pelaksanaan evaluasi dan penyusunan laporan; dan</li>
                    <li>Pelaksanaan tugas-tugas kedinasan lain yang diberikan oleh Kepala Badan.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    1. Sub Bidang Pembinaan Aparatur Sipil Negara mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun program kepangkatan, pengangkatan dan pemberhentian;</li>
                    <li>Melakukan pengelolaan administrasi pengangkatan Calon Pegawai Negeri Sipil (CPNS) menjadi PNS;</li>
                    <li>Melakukan pengelolaan administrasi kepangkatan PNS;</li>
                    <li>Melakukan pengelolaan administrasi pemberhentian PNS kecuali pemberhentian karena pelanggaran disiplin atau pelanggaran karena tindak pidana/penyelewengan;</li>
                    <li>Melakukan pengelolaan administrasi pemutusan hubungan kerja P3K;</li>
                    <li>Melakukan verifikasi Penilaian PAK JFT dan kenaikan gaji PNS;</li>
                    <li>Melakukan ujian kenaikan pangkat dan penyesuaian ijazah PNS;</li>
                    <li>Melakukan pembekalan bagi PNS yang akan purna tugas;</li>
                    <li>Melakukan peninjauan masa kerja PNS;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Mutasi.</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    2. Sub Bidang Informasi Kepegawaian mempunyai tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun rencana program bidanng informasi kepagawaian;</li>
                    <li>menyusun Daftar urut Kepangkatan (DUK) dan Bazzeting;</li>
                    <li>Melakukan pengeloahan dan pengelolaan data Kepegawaian ASN ;</li>
                    <li>Melakukan Pengeloaan dan peyusunan laporan kepegawaian ASN;</li>
                    <li>Menyusun dan menerbitkan profil/buletin ASN;</li>
                    <li>Menyusun,mengembangkan dan mengelola sistem informasi Pegawaian ;</li>
                    <li>Melakukan pengloaan dan pemeliharaan sistem presensi ASN;</li>
                    <li>melakukan pengelolaan Website kepegawaian ASN;</li>
                    <li>Melakukan evaluasi dan menyusun laporan ; dan</li>
                    <li>melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Pembinaan, Informasi dan Dokumentasi Kepegawaian</li>
                </ol>
            </div>

            <div class="bg-white rounded-lg p-4 md:p-6">
                <p class="text-sm md:text-base text-gray-700 mb-4">
                    3. Sub Bidang Dokumentasi Kepegawaian mempunyai  tugas :
                </p>
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Menyusun rencana program bidang dokumentasi kepegawaian;</li>
                    <li>Melakukan pengelolaan dokumen fisik dan digital kepegawaian ASN;</li>
                    <li>Melakukan pengelolaan LP2P dan LHKASN;</li>
                    <li>Melakukan pengelolaan dan pembinaan tata naskah kepegawaian ASN;</li>
                    <li>Melakukan pelayanan pengurusan dan penerbitan identitas kepegawaian ASN;</li>
                    <li>Melakukan evaluasi dan menyusun laporan; dan</li>
                    <li>Melakukan tugas-tugas kedinasan lain yang diberikan oleh Kepala Bidang Pembinaan, Informasi dan Dokumentasi Kepegawaian.</li>
                </ol>
            </div>
        </div>
    </section>
    
    <section id="struktur-organisasi" class="bg-gray shadow-md py-4 px-4 md:px-32">
        <div class="text-center pt-8 md:pt-12">
            <h2 class="text-xl md:text-2xl font-bold text-blue-900 mb-6 md:mb-8">Struktur Organisasi</h2>
        </div>
        <div class="flex justify-center">
            <img 
                src="{{ asset('asset/image/kosong.jpg') }}" 
                alt="Struktur Organisasi"
                class="w-full md:w-auto max-w-full h-auto object-contain rounded-lg shadow-md"
            >
        </div>
    </section>

    <section id="daftar-pegawai" class="bg-gray shadow-md py-4 px-4 md:px-32 pt-8 md:pt-12">
        <div class="bg-white rounded-lg p-4 md:p-6">
            <div class="text-justify space-y-4 md:space-y-6">
                <h5 class="text-lg md:text-xl font-semibold text-black-900 mb-4 text-center">DAFTAR PEGAWAI</h5>
                
                <p class="text-sm md:text-base text-gray-700">
                    1. Badan Kepegawaian, Pendidikan dan Pelatihan merupakan unsur penunjang urusan pemerintahan yang menjadi kewenangan daerah dibidang kepegawaian serta pendidikan dan pelatihan
                </p>
                
                <p class="text-sm md:text-base text-gray-700">
                    Badan Kepegawaian, Pendidikan dan Pelatihan dipimpin oleh Kepala Badan yang berkedudukan di bawah dan bertanggung jawab kepada Bupati melalui Sekretaris Daerah.
                </p>
                
                <ol class="list-[lower-alpha] text-sm md:text-base text-gray-700 pl-4 md:pl-10 space-y-2">
                    <li>Perumusan rencana program pengembangan, pendidikan dan pelatihan;</li>
                    <li>Perumusan perencanaan dan penetapan kebutuhan ASN;</li>
                    <li>Pelaksanaan pengadaan calon ASN;</li>
                    <li>Pelaksanaan pengangkatan dan penempatan calon ASN;</li>
                    <li>Perumusan perencanaan pengembangan serta pendidikan dan pelatihan ASN;</li>
                    <li>Pelaksanaan pengembangan serta pendidikan dan pelatihan ASN;</li>
                    <li>Perumusan program kesejahteraan ASN;</li>
                    <li>Pelaksanaan evaluasi dan penyusunan laporan; dan</li>
                    <li>Pelaksanaan tugas-tugas kedinasan lain yang diberikan oleh Kepala Badan.</li>
                </ol>                       
            </div>
        </div>
    </section>

    @include('components.footer')
    <!-- Tombol Scroll ke Atas -->
    <button id="scrollToTopBtn" class="fixed bottom-6 right-6 bg-red-800 text-white p-4 rounded-full shadow-lg hover:bg-red-700 transition duration-300">
        <i class="fas fa-arrow-up"></i>
    </button>
    
</body>
<script>
    window.onscroll = function() {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("top-0");
            navbar.classList.remove("bottom-0");
        } else {
            navbar.classList.remove("top-0");
        }
    };

    document.getElementById("scrollToTopBtn").onclick = function() {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    };

    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Smooth scroll for navigation links
    const links = document.querySelectorAll('a[href^="#"]');

    for (const link of links) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    }
</script>
</html>
