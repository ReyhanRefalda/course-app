<x-app-layout>
<div class="container mx-auto py-8">
    <!-- Judul Artikel -->
    <div class="bg-white p-6 rounded-lg shadow-lg mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $artikel->judul }}</h1>
        <p class="text-gray-600 text-lg">{{ $artikel->isi }}</p>
        <small class="text-sm text-gray-500">Ditulis oleh: {{ $artikel->user ? $artikel->user->nama : 'Penulis tidak ditemukan' }} pada {{ $artikel->created_at->format('d M Y') }}</small>
    </div>

    <!-- Tombol Kembali ke Daftar Artikel -->
    <div class="mt-6">
        <a href="{{ route('user.artikel.index') }}" class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
            Kembali ke Daftar Artikel
        </a>
    </div>
</div>
</x-app-layout>
