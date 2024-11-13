<x-app-layout>
    <div class="container mx-auto py-8">
        <!-- Daftar Artikel -->
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Artikel</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($artikels as $artikel)
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $artikel->judul }}</h2>
                    <p class="text-gray-600 mb-4">Penulis: {{ $artikel->user->nama }}</p>
                    <p class="text-gray-700 text-base mb-4">{{ Str::limit($artikel->isi, 150) }}</p>
                    <a href="{{ route('user.artikel.show', $artikel->id) }}" class="text-blue-600 hover:text-blue-800 font-medium">Baca Selengkapnya</a>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $artikels->links() }}
        </div>
    </div>
</x-app-layout>
