<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Daftar Modul') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Manajemen Modul</h3>
                    <a href="{{ route('admin.modul.create') }}" 
                       class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition">
                        Tambah Modul
                    </a>
                </div>

                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2 text-left text-gray-600">#</th>
                            <th class="border px-4 py-2 text-left text-gray-600">Judul Modul</th>
                            <th class="border px-4 py-2 text-left text-gray-600">Pelajaran</th>
                            <th class="border px-4 py-2 text-left text-gray-600">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($moduls as $modul)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="border px-4 py-2 text-gray-700">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2 text-gray-700">{{ $modul->judul }}</td>
                            <td class="border px-4 py-2 text-gray-700">
                                {{ $modul->pelajaran->pluck('judul')->join(', ') }}
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.modul.edit', $modul->id) }}" 
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded shadow transition">
                                        <span class="inline-flex items-center">
                                            <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M15 12H9m12-8.485l-2.121 2.121m-12.728 12.728l-2.121 2.121M15 12v9m0 0H9m6 0v-9m0-9H9m0 0V3m6 0v9"></path>
                                            </svg>
                                            Edit
                                        </span>
                                    </a>
                                    <form action="{{ route('admin.modul.destroy', $modul->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded shadow transition"
                                                onclick="return confirm('Yakin ingin menghapus modul ini?')">
                                            <span class="inline-flex items-center">
                                                <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 18L18 6M6 6l12 12"></path>
                                                </svg>
                                                Hapus
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center border px-4 py-2 text-gray-500">Belum ada data modul.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
