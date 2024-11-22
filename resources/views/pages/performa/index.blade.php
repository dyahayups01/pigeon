<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Performa</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Performa Pegawai BPS Kabupaten Kepulauan Meranti</h1>
        
        <form action="{{ route('performa.lihat') }}" method="GET" class="mb-6">
            @csrf
            <div class="flex space-x-4">
                <div>
                    <label for="tahun" class="block text-sm font-medium text-gray-700">Tahun</label>
                    <select id="tahun" name="tahun" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option disabled selected>Pilih Tahun</option>
                        @foreach($years as $tahun)
                        <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div>
                    <label for="bulan" class="block text-sm font-medium text-gray-700">Bulan</label>
                    <select id="bulan" name="bulan" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                        <option disabled selected>Pilih Bulan</option>
                        @foreach($months as $bulan)
                            <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>{{ $bulan }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Lihat Data</button>
        </form>

        @isset($performas)
            <table class="min-w-full bg-white">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2">Tahun</th>
                        <th class="px-4 py-2">Bulan</th>
                        <th class="px-4 py-2">NIP BPS</th>
                        <th class="px-4 py-2">Nama</th>
                        <th class="px-4 py-2">Nilai SKP</th>
                        <th class="px-4 py-2">Terlambat 1</th>
                        <th class="px-4 py-2">Terlambat 2</th>
                        <th class="px-4 py-2">Terlambat 3</th>
                        <th class="px-4 py-2">Terlambat 4</th>
                        <th class="px-4 py-2">Hari Kerja</th>
                        <!--<th class="px-4 py-2">Absensi Bulanan</th>-->
                        <th class="px-4 py-2">Hadir Apel</th>
                        <th class="px-4 py-2">Jumlah Apel</th>
                        <!--<th class="px-4 py-2">Nilai Apel</th>
                        <th class="px-4 py-2">Skor</th>
                        <th class="px-4 py-2">Ranking</th>-->
                        <!--<th class="px-4 py-2">Aksi</th>-->
                    </tr>
                </thead>
                <tbody>
                    @foreach($performas as $performa)
                        <tr>
                            <td class="border px-4 py-2">{{ $performa->tahun }}</td>
                            <td class="border px-4 py-2">{{ $performa->bulan }}</td>
                            <td class="border px-4 py-2">{{ $performa->nipBps }}</td>
                            <td class="border px-4 py-2">{{ $performa->nama }}</td>
                            <td class="border px-4 py-2">{{ $performa->skp }}</td>
                            <td class="border px-4 py-2">{{ $performa->tl1 }}</td>
                            <td class="border px-4 py-2">{{ $performa->tl2 }}</td>
                            <td class="border px-4 py-2">{{ $performa->tl3 }}</td>
                            <td class="border px-4 py-2">{{ $performa->tl4 }}</td>
                            <td class="border px-4 py-2">{{ $performa->hk }}</td>
                            <!--<td class="border px-4 py-2">{{ $performa->absensi_bulanan }}</td>-->
                            <td class="border px-4 py-2">{{ $performa->hadirApel }}</td>
                            <td class="border px-4 py-2">{{ $performa->jumlahApel }}</td>
                            <!--<td class="border px-4 py-2">{{ $performa->nilai_apel }}</td>
                            <td class="border px-4 py-2">{{ $performa->skor }}</td>
                            <td class="border px-4 py-2">{{ $performa->ranking }}</td>-->
                            <!--<td class="border px-4 py-2">
                                @if(!$performa->approved)
                                    <form action="{{ route('performa.approve') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $performa->id }}">
                                        <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded-md hover:bg-green-700">Approve</button>
                                    </form>
                                    <form action="{{ route('performa.reject') }}" method="POST" class="inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $performa->id }}">
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-700">Reject</button>
                                    </form>
                                @else
                                    <span class="text-green-500">Approved</span>
                                @endif
                            </td>-->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endisset
    </div>
</body>
</html>
</x-app-layout>