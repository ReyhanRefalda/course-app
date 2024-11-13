<x-app-layout>
    <div class="container mx-auto p-8 bg-gray-50 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-gray-700 text-center">Daftar Pengguna</h1>

        @if (session('success'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded-lg animate-pulse"
                role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9 12l-2-2 1.414-1.414L9 9.172l3.586-3.586L14 6l-5 5z" />
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="px-6 py-4 text-left font-semibold">Nama</th>
                    <th class="px-6 py-4 text-left font-semibold">Email</th>
                    <th class="px-6 py-4 text-left font-semibold">Role</th>
                    <th class="px-6 py-4 text-left font-semibold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100 transition duration-150">
                        <td class="px-6 py-4 text-gray-800">{{ $user->nama }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-gray-800">{{ ucfirst($user->usertype) }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                class="flex items-center px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path
                                    d="M10 3a1 1 0 011 1v7a1 1 0 01-2 0V4a1 1 0 011-1zM5 8a1 1 0 011 1v4a1 1 0 01-2 0V9a1 1 0 011-1zm9 0a1 1 0 011 1v4a1 1 0 01-2 0V9a1 1 0 011-1zM6.293 2.293a1 1 0 111.414 1.414L5.414 4H9a1 1 0 110 2H4a1 1 0 110-2h3.586l2.293-2.293a1 1 0 111.414 1.414L9 4h2a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2h2l-2.293-2.293z" />
                                </svg>
                                Edit
                            </a>
                            <form action="{{ route('admin.users.destroyUser', $user->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="flex items-center px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200">
                                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M10 3a1 1 0 011 1v7a1 1 0 01-2 0V4a1 1 0 011-1zM5 8a1 1 0 011 1v4a1 1 0 01-2 0V9a1 1 0 011-1zm9 0a1 1 0 011 1v4a1 1 0 01-2 0V9a1 1 0 011-1zM6.293 2.293a1 1 0 111.414 1.414L5.414 4H9a1 1 0 110 2H4a1 1 0 110-2h3.586l2.293-2.293a1 1 0 111.414 1.414L9 4h2a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2h2l-2.293-2.293z" />
                                    </svg>
                                    Hapus
                                </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
