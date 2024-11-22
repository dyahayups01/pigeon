<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-lg">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Performa Pegawai BPS Kabupaten Kepulauan Meranti</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Data Performa Pegawai BPS Kabupaten Kepulauan Meranti</h1>

        <form action="{{ route('performa.storeData') }}" method="POST" class="mb-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
            <div class="grid grid-cols-1 gap-4">
                <div>
                    <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <select id="tahun" name="tahun" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>


                <div>
                    <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                    <select id="bulan" name="bulan" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach($months as $month)
                            <option value="{{ $month }}">{{ $month }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="pegawai_data" class="block text-sm font-medium text-gray-700">Nama Pegawai</label>
                    <select id="pegawai_data" name="pegawai_data" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        @foreach($pegawais as $pegawai)
                            <option value="{{ $pegawai->nipBps }}">{{ $pegawai->nama }} ({{ $pegawai->nipBps }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tambahkan input untuk variabel lainnya -->

                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Nilai SKP (KipApp)</label>
                    <input type="number" id="skp" name="skp" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Nilai CKP</label>
                    <input type="number" id="ckp" name="ckp" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Terlambat 1</label>
                    <input type="number" id="tl1" name="tl1" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Terlambat 2</label>
                    <input type="number" id="tl2" name="tl2" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Terlambat 3</label>
                    <input type="number" id="tl3" name="tl3" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Terlambat 4</label>
                    <input type="number" id="tl4" name="tl4" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Pulang Sebelum Waktu 1</label>
                    <input type="number" id="psw1" name="psw1" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Pulang Sebelum Waktu 2</label>
                    <input type="number" id="psw2" name="psw2" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Pulang Sebelum Waktu 3</label>
                    <input type="number" id="psw3" name="psw3" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Pulang Sebelum Waktu 4</label>
                    <input type="number" id="psw4" name="psw4" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Kekurangan Jam Kerja</label>
                    <input type="number" id="kjk" name="kjk" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Jumlah Hari Kerja</label>
                    <input type="number" id="hk" name="hk" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Jumlah Hadir Apel</label>
                    <input type="number" id="hadirApel" name="hadirApel" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>
                                <div>
                    <label for="nilai_skp" class="block text-sm font-medium text-gray-700">Jumlah Apel</label>
                    <input type="number" id="jumlahApel" name="jumlahApel" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                </div>

                <!-- Tambahkan input untuk variabel lainnya -->

            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Tambah Data</button>
        </form>

        <form action="{{ route('performa.import') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">Import Data dari Excel</label>
                <input type="file" id="file" name="file" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
            </div>
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Import Data</button>
        </form>

        <a href="{{ route('performa.template') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700">Download Template Excel</a>
    </div>
</body>
</html>
</x-app-layout>