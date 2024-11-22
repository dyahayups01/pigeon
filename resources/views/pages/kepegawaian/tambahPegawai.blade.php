<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-lg">
    <!--<h2 class="text-2xl font-bold mb-2 text-gray-800">Kotak di Background</h2>
    <p class="text-gray-600">Ini adalah kotak dengan background putih, rounded corners, dan shadow.</p>
  </div>-->

  <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Entri Data Pegawai</title>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
  <div class="bg-white p-6 rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Entri Data Pegawai</h2>

    @if (session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

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
    
    <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="mb-4">
        <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama" id="nama" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="nipBps" class="block text-sm font-medium text-gray-700">NIP BPS</label>
        <input type="text" name="nipBps" id="nipBps" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="nipPns" class="block text-sm font-medium text-gray-700">NIP PNS</label>
        <input type="text" name="nipPns" id="nipPns" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="pangkat" class="block text-sm font-medium text-gray-700">Pangkat</label>
        <input type="text" name="pangkat" id="pangkat" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="golongan" class="block text-sm font-medium text-gray-700">Golongan</label>
        <input type="text" name="golongan" id="golongan" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="jabatan" class="block text-sm font-medium text-gray-700">Jabatan</label>
        <input type="text" name="jabatan" id="jabatan" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
      <div class="mb-4">
        <label for="grade" class="block text-sm font-medium text-gray-700">Grade</label>
        <input type="text" name="grade" id="grade" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
      </div>
     /** <div class="mb-4">
        <label for="excel" class="block text-sm font-medium text-gray-700">Upload Excel</label>
        <input type="file" name="excel" id="excel" class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-md shadow-sm cursor-pointer focus:outline-none">
      </div> */
      <div class="flex justify-between">
        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-700">Submit</button>
        <button type="reset" class="px-4 py-2 bg-gray-500 text-white rounded-md shadow-md hover:bg-gray-700">Reset</button>
      </div>
    </form>
  </div>
</body>
</x-app-layout>
