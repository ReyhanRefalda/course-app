<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN 
        <span class="text-gray-900"><b>/ DAFTAR PELAJARAN</b></span>
    </h1>
    
    <div class="w-full flex justify-between items-center mb-4 space-x-4">
        <a href="{{ route('admin.pelajaran.create') }}"
            class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Tambah Pelajaran
        </a>
        <div class="w-full max-w-md">
            <form action="#" method="GET">
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Cari data pelajaran..."
                        value="{{ request('search') }}"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-100 dark:text-gray-900 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (session('success'))
        <div class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:border-blue-700 rounded-lg"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ml-3 text-sm font-medium">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($pelajarans as $pelajaran)
                <div
                    class="p-4 bg-white rounded-lg shadow-[5px_5px_10px_lightblue] hover:shadow-[0_5px_15px_skyblue] hover:translate-y-2 hover:translate-x-[-2px] border border-gray-200 transition duration-300 ease-in-out">
                    <h3 class="text-xl font-semibold mb-2">{{ $pelajaran->judul }}</h3>
                    <p class="text-sm text-gray-500">
                        <span class="text-sm font-semibold">Video URL:</span>
                        {{ Str::limit($pelajaran->video_url, 50) }}
                    </p>
                    <p class="text-sm text-gray-500 mb-3">
                        <span class="text-sm font-semibold">Penjelasan:</span>
                        {{ Str::limit($pelajaran->konten, 50) }}
                    </p>
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.pelajaran.edit', $pelajaran->id) }}"
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                            Edit
                        </a>
                        <form action="{{ route('admin.pelajaran.destroy', $pelajaran->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus pelajaran ini?')">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    Belum ada pelajaran.
                </div>
            @endforelse
        </div>
    </div>
</x-admin>
