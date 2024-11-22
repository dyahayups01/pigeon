<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval Data Performa</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white text-gray-800">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">Approval Data Performa</h1>

        <table class="min-w-full bg-white">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2">Nama</th>
                    <th class="px-4 py-2">Nilai SKP</th>
                    <th class="px-4 py-2">TL1</th>
                    <th class="px-4 py-2">TL2</th>
                    <th class="px-4 py-2">TL3</th>
                    <th class="px-4 py-2">TL4</th>
                    <th class="px-4 py-2">HK</th>
                    <th class="px-4 py-2">Absensi Bulanan</th>
                    <th class="px-4 py-2">Hadir Apel</th>
                    <th class="px-4 py-2">Jumlah Apel</th>
                    <th class="px-4 py-2">Nilai Apel</th>
                    <th class="px-4 py-2">Skor</th>
                    <th class="px-4 py-2">Ranking</th>
                    <th class="px-4 py-2">Tahun</th>
                    <th class="px-4 py-2">Bulan</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($performas as $performa)
                    <tr>
                        <td class="border px-4 py-2">{{ $performa->nama }}</td>
                        <td class="border px-4 py-2">{{ $performa->nilai_skp }}</td>
                        <td class="border px-4 py-2">{{ $performa->tl1 }}</td>
                        <td class="border px-4 py-2">{{ $performa->tl2 }}</td>
                        <td class="border px-4 py-2">{{ $performa->tl3 }}</td>
                        <td class="border px-4 py-2">{{ $performa->tl4 }}</td>
                        <td class="border px-4 py-2">{{ $performa->hk }}</td>
                        <td class="border px-4 py-2">{{ $performa->absensi_bulanan }}</td>
                        <td class="border px-4 py-2">{{ $performa->hadir_apel }}</td>
                        <td class="border px-4 py-2">{{ $performa->jumlah_apel }}</td>
                        <td class="border px-4 py-2">{{ $performa->nilai_apel }}</td>
                        <td class="border px-4 py-2">{{ $performa->skor }}</td>
                        <td class="border px-4 py-2">{{ $performa->ranking }}</td>
                        <td class="border px-4 py-2">{{ $performa->tahun }}</td>
                        <td class="border px-4 py-2">{{ $performa->bulan }}</td>
                        <td class="border px-4 py-2">
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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
</x-app-layout>