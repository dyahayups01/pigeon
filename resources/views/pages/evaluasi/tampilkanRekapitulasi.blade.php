<!-- resources/views/evaluasi/tampilkanRekapitulasi.blade.php -->

<x-app-layout>

@section('content')
<div class="container mx-auto py-8">
    <div class="w-full max-w-4xl mx-auto bg-white p-8 border border-gray-300">
        <h2 class="text-2xl font-bold mb-6">Hasil Rekapitulasi Performa</h2>

        <table class="w-full table-auto border-collapse border border-gray-400">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">NIP BPS</th>
                    <th class="border border-gray-300 px-4 py-2">Nama</th>
                    <th class="border border-gray-300 px-4 py-2">Evaluasi Bulanan</th>
                    <!--<th class="border border-gray-300 px-4 py-2">Ranking</th>-->
                </tr>
            </thead>
            <tbody>
                @foreach($evaluasis as $evaluasi)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $evaluasi->nipBps }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $evaluasi->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $evaluasi->evaluasiBulanan }}</td>
                        <!--<td class="border border-gray-300 px-4 py-2">{{ $evaluasi->ranking }}</td>-->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
