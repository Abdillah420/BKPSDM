<div id="popup" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-md w-full">
        <h2 class="text-xl font-bold mb-4">Berita Terbaru</h2>
        <div id="popup-content">
            <!-- Konten berita akan dimuat di sini -->
        </div>
        <button onclick="closePopup()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Tutup</button>
    </div>
</div>

<script>
    function openPopup(content) {
        document.getElementById('popup-content').innerHTML = content;
        document.getElementById('popup').classList.remove('hidden');
    }

    function closePopup() {
        document.getElementById('popup').classList.add('hidden');
    }
</script> 