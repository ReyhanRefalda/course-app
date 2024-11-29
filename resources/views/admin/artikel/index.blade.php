<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">
        DASHBOARD ADMIN <span class="text-gray-900"><b>/ DAFTAR ARTIKEL</b></span>
    </h1>
    <div class="w-full flex justify-between items-center mb-4 space-x-4">
        <a href="{{ route('admin.artikel.create') }}"
            class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Tambah Artikel
        </a>
        <div class="w-full max-w-md">
            <form action="{{ route('admin.artikel.index') }}" method="GET">
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Cari artikel" value="{{ request('search') }}"
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
        </div>
    @endif

    <div class="grid grid-cols-3 gap-4">
        @foreach ($artikels as $artikel)
            <div
                class="max-w-sm mx-auto bg-white shadow-md rounded-lg overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail) }}" alt="Artikel Thumbnail" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-bold text-gray-800">{{ $artikel->title }}</h2>
                    <p class="text-gray-600 text-sm mt-1">
                        Ditulis oleh <span class="font-semibold">{{ $artikel->user->nama }}</span>
                        pada <span class="font-semibold">{{ $artikel->created_at->isoFormat('dddd, D MMMM Y') }}</span>
                    </p>
                    <p class="mt-2 text-gray-700 line-clamp-3">{{ $artikel->description }}</p>
                    <span class="mt-4 inline-block px-3 py-1 text-xs font-bold rounded
                    {{ $artikel->status == 'publish' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                        {{ ucfirst($artikel->status) }}
                    </span>
                    <div class="mt-4 flex gap-4">
                        <a href="{{ route('admin.artikel.show', $artikel->id) }}" class="text-blue-500 hover:underline">
                            Show
                        </a>
                        <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="text-yellow-500 hover:underline">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="py-4">
        {!! $artikels->links() !!}
    </div>
</x-admin>
