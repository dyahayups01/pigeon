<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Edit Data Pegawai</title>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-screen-lg">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Pegawai</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </span>
            </div>
        @endif

        <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST" class="mb-6">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nipBps" class="block text-sm font-medium text-gray-700">NIP BPS</label>
                <input type="text" name="nipBps" id="nipBps" value="{{ $pegawai->nipBps }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ $pegawai->nama }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="nipPns" class="block text-sm font-medium text-gray-700">NIP PNS</label>
                <input type="text" name="nipPns" id="nipPns" value="{{ $pegawai->nipPns }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat</label>
                <input type="text" name="pangkat" id="pangkat" value="{{ $pegawai->pangkat }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="golongan" class="block text-sm font-medium text-gray-700">Golongan</label>
                <input type="text" name="golongan" id="golongan" value="{{ $pegawai->golongan }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" value="{{ $pegawai->jabatan }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
                <input type="text" name="grade" id="grade" value="{{ $pegawai->grade }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
