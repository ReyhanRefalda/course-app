<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Daftar Artikel</h1>
        <a href="{{ route('admin.artikel.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 hover:bg-blue-600 inline-block">Tambah Artikel</a>
        <table class="min-w-full bg-white border border-gray-200 rounded shadow-lg">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-2 px-4 border-b">Judul</th>
                    <th class="py-2 px-4 border-b">Penulis</th>
                    <th class="py-2 px-4 border-b">Isi</th>
                    <th class="py-2 px-4 border-b">Tanggal Dibuat</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($artikels as $artikel)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $artikel->judul }}</td>
                        <td class="py-2 px-4 border-b">{{ $artikel->user->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $artikel->isi }}</td>
                        <td class="py-2 px-4 border-b">{{ $artikel->created_at->format('d M Y') }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </x-app-layout>
    