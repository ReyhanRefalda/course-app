<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900"><b>/ DAFTAR
                ARTIKEL</b></span>
    </h1>
    <div class="w-full flex space-between mb-4">
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">Tambah Artikel </a>
        <div>
            <form action="{{ route('admin.artikel.index') }}" method="GET">
                <div class="flex items-center">
                    <input type="text" name="search" placeholder="Cari artikel" value="{{ request('search') }}"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-white dark:border-gray-600 focus:border-blue-500 focus:ring-blue-500">
                    <button type="submit"
                        class="px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-white dark:border-gray-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
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
        <div id="alert-border-1"
            class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:border-blue-700 rounded-lg"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewbox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                <span>{{ session('success') }}</span>
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:text-blue-400"
                data-dismiss-target="#alert-border-1" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Thumbnail
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Judul
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Penulis
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Deskripsi
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Upload
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikels as $artikel)
                    <tr
                        class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 [&>td]:max-h-[20px]">
                        <td scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $loop->iteration }}
                        </td>
                        <td class="px-6 py-4">
                            <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail) }}"
                                alt="" class="w-14 h-10 object-cover rounded-md">
                        </td>
                        <td class="px-6 py-4">
                            {{ $artikel->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $artikel->user->nama }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $artikel->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $artikel->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $artikel->created_at->isoFormat('dddd, D MMMM Y') }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            {{-- link show with slug --}}
                            <a href="{{ route('admin.artikel.show', $artikel->slug) }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show</a>
                            <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST"
                                onsubmit="return confirm('Apakah anda yakin ingin menghapus artikel ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="py-4">
        {!! $artikels->links() !!}
    </div>
</x-admin>
