<!-- resources/views/evaluasi/tampilkanRekapitulasi.blade.php -->

<x-app-layout>
<div class="container mx-auto py-8">
    <div class="w-full max-w-lg mx-auto bg-white p-8 border border-gray-300">
        <h2 class="text-2xl font-bold mb-6">Rekapitulasi Performa</h2>
        <form action="{{ route('evaluasi.tampilkanRekapitulasi') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="tahun" class="block text-gray-700">Tahun:</label>
                <select id="tahun" name="tahun" class="block w-full mt-1 border-gray-300 rounded-md">
                    @foreach($years as $tahun)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="bulan" class="block text-gray-700">Bulan:</label>
                <select id="bulan" name="bulan" class="block w-full mt-1 border-gray-300 rounded-md">
                    @foreach($months as $bulan)
                        <option value="{{ $bulan }}">{{ $bulan }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Lihat Data</button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>