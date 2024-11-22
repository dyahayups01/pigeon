<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Dalam Pembangunan</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center">
        <div class="bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 mb-4">Halaman Ini Sedang Dalam Pembangunan</h1>
            <p class="text-gray-600 mb-6">Maaf, halaman ini masih dalam proses pengembangan. Kami akan segera kembali dengan hasil yang lebih baik.</p>
            <a href="{{ url('/') }}" class="text-blue-500 hover:text-blue-700 font-semibold">Kembali ke Beranda</a>
        </div>
    </div>
</body>
</html>
</x-app-layout>