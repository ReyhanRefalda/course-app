<x-admin>
    <x-slot name="title">Daftar Pelajaran</x-slot>

    <div class="mb-4 flex justify-between items-center">
        <h2 class="text-xl font-bold text-gray-800">Manajemen Pelajaran</h2>
        <a href="{{ route('admin.pelajaran.create') }}" 
           class="bg-gradient-to-r from-green-500 to-green-700 hover:from-green-600 hover:to-green-800 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition">
            Tambah Pelajaran
        </a>
    </div>

    @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 rounded-lg" role="alert">
            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path d="M8.257 3.099c.366-.446.905-.759 1.493-.759h.5a1.75 1.75 0 0 1 1.493.759L14.9 6.575a1.75 1.75 0 0 1 .409 1.22v7.27a1.75 1.75 0 0 1-1.75 1.75H6.441a1.75 1.75 0 0 1-1.75-1.75v-7.27a1.75 1.75 0 0 1 .409-1.22L8.257 3.1zM9.5 8.5a.75.75 0 1 0 1.5 0 .75.75 0 0 0-1.5 0z" />
            </svg>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-6 py-3">#</th>
                    <th class="px-6 py-3">Judul</th>
                    <th class="px-6 py-3">Video URL</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pelajarans as $pelajaran)
                <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900 dark:even:bg-gray-800 border-b dark:border-gray-700">
                    <td class="px-6 py-4 text-gray-900 dark:text-white">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $pelajaran->judul }}</td>
                    <td class="px-6 py-4">{{ $pelajaran->video_url ?? '-' }}</td>
                    <td class="px-6 py-4 flex space-x-2">
                        <a href="{{ route('admin.pelajaran.edit', $pelajaran->id) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded shadow transition">
                            Edit
                        </a>
                        <form action="{{ route('admin.pelajaran.destroy', $pelajaran->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded shadow transition"
                                    onclick="return confirm('Yakin ingin menghapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center px-6 py-4 text-gray-500">Belum ada pelajaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-admin>
