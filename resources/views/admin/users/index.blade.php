<x-admin>
    <div class="p-6 bg-gradient-to-r from-gray-100 via-white to-gray-100 min-h-screen">

        <!-- Header -->
        <div
            class="flex justify-between items-center mb-8 p-4 bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold flex items-center gap-2">
                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m2 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Dashboard Admin
            </h1>
            <span class="text-gray-100 text-sm font-semibold">/ Daftar User</span>
        </div>

        @if (session('success'))
            <div id="alertMessage"
                class="fixed top-5 right-5 bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg z-50 flex items-center gap-4">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m2 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ session('success') }}</span>
                <button onclick="closeAlert()" class="ml-4 text-white hover:text-gray-300">&times;</button>
            </div>
        @endif

        <!-- Tabel sebagai Kartu -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($users as $user)
                <div
                    class="p-4 bg-white rounded-lg shadow-md hover:shadow-lg border border-gray-200 transition transform hover:-translate-y-1">
                    <div class="flex items-center justify-between mb-3">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $user->nama }}</h3>
                        <span
                            class="text-xs px-2 py-1 bg-blue-100 text-blue-600 rounded-full">{{ ucfirst($user->usertype) }}</span>
                    </div>
                    <p class="text-sm text-gray-500">{{ $user->email }}</p>
                    <p class="text-sm text-gray-500">Terdaftar: {{ $user->created_at->format('d M Y') }}</p>
                    <div class="mt-4 flex gap-4">
                        <button type="button" onclick="openModal('updateProductModal-{{ $user->id }}')"
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-800 hover:shadow-lg transition">
                            Edit
                        </button>
                        <button type="button" onclick="confirmDelete('{{ $user->id }}', '{{ $user->nama }}')"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg shadow-md hover:bg-red-800 hover:shadow-lg transition">
                            Hapus
                        </button>

                    </div>
                </div>
            @endforeach
        </div>


        @foreach ($users as $user)
            <div id="updateProductModal-{{ $user->id }}" tabindex="-1" aria-hidden="true"
                class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 flex items-center justify-center">
                <div class="bg-white w-full max-w-md p-6 rounded-lg shadow-lg transform transition-all scale-95">
                    <!-- Header Modal -->
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-semibold">Edit User</h2>
                        <button type="button" onclick="closeModal('updateProductModal-{{ $user->id }}')"
                            class="text-gray-500 hover:text-gray-700 text-lg">
                            &times;
                        </button>
                    </div>

                    <!-- Form Modal -->
                    <form action="{{ route('admin.users.updateUser', $user->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <!-- Input Nama -->
                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-semibold mb-2">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{ old('nama', $user->nama) }}"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Input Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-semibold mb-2">Email</label>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', $user->email) }}"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <!-- Pilihan Role -->
                        <div class="mb-4">
                            <label for="usertype" class="block text-sm font-semibold mb-2">Role</label>
                            <select name="usertype" id="usertype"
                                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="user" {{ $user->usertype == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->usertype == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                            </select>
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-end gap-3">
                            <button type="button" onclick="closeModal('updateProductModal-{{ $user->id }}')"
                                class="px-4 py-2 text-gray-600 border rounded-lg hover:bg-gray-50">
                                Tutup
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-md hover:bg-blue-800 hover:shadow-lg transition">
                                Simpan
                            </button>
                        </div>
                    </form>

                    <!-- Form untuk menghapus user -->
                </div>
            </div>
        @endforeach

    </div>

    <!-- Script untuk Modal -->
    <script>
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('hidden'); // Menampilkan modal
                modal.classList.add('flex'); // Menambah flex untuk centering
            }
        }

        function closeAlert() {
            const alert = document.getElementById('alertMessage');
            if (alert) alert.remove();
        }

        // Otomatis hilang setelah 5 detik
        setTimeout(closeAlert, 5000);

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.classList.remove('flex'); // Menghapus flex
                modal.classList.add('hidden'); // Menyembunyikan modal
            }
        }

        function confirmDelete(userId, userName) {
            if (confirm(`Apakah Anda yakin ingin menghapus user ${userName}?`)) {
                // Kirim form
                document.getElementById(`deleteUserForm-${userId}`).submit();
            }
        }

       
    </script>
</x-admin>
