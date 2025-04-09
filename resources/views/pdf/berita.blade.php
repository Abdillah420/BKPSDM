<!DOCTYPE html>
<html>
<head>
    <title>{{ $berita->title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        p {
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h1>{{ $berita->title }}</h1>
    <p>{{ $berita->isi }}</p>
    <p><strong>Slug:</strong> {{ $berita->slug }}</p>
    <p><strong>Penting:</strong> {{ $berita->penting ? 'Ya' : 'Tidak' }}</p>
</body>
</html> 