<!-- resources/views/users/edit.blade.php -->
<x-app-layout>
    <div class="container mx-auto p-8 bg-gray-50 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold mb-8 text-gray-700 text-center">Edit Pengguna</h1>

        @if (session('success'))
            <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3 mb-6 rounded-lg" role="alert">
                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9 12l-2-2 1.414-1.414L9 9.172l3.586-3.586L14 6l-5 5z"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.users.updateUser', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PATCH')

            <!-- Input untuk Nama -->
            <div>
                <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}" class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('nama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Input untuk Email -->
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Dropdown untuk Role -->
            <div>
                <label for="usertype" class="block text-gray-700 font-semibold mb-2">Role</label>
                <select name="usertype" id="usertype" class="p-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <!-- Tombol Simpan -->
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
