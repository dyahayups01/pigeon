<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Daftar Pegawai BPS Kabupaten Kepulauan Meranti</h2>

            <div class="flex-grow p-6">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4"></th>
                                <th scope="col" class="px-6 py-3">NIP BPS</th>
                                <th scope="col" class="px-6 py-3">Nama</th>
                                <th scope="col" class="px-6 py-3">NIP</th>
                                <th scope="col" class="px-6 py-3">Pangkat</th>
                                <th scope="col" class="px-6 py-3">Golongan</th>
                                <th scope="col" class="px-6 py-3">Jabatan</th>
                                <th scope="col" class="px-6 py-3">Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pegawais as $pgw)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="p-4"></td>
                                    <td class="px-6 py-4">{{ $pgw->nipBps }}</td>
                                    <td class="px-6 py-4">{{ $pgw->nama }}</td>
                                    <td class="px-6 py-4">{{ $pgw->nipPns }}</td>
                                    <td class="px-6 py-4">{{ $pgw->pangkat }}</td>
                                    <td class="px-6 py-4">{{ $pgw->golongan }}</td>
                                    <td class="px-6 py-4">{{ $pgw->jabatan }}</td>
                                    <td class="px-6 py-4">{{ $pgw->grade }}</td>
									<td class="flex items-center px-6 py-4 space-x-3">
									<a href="pegawai.update" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
									<a href="{{route('pegawai.destroy')}}" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
									</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>