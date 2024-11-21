<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Daftar Modul') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-700">Manajemen Modul</h3>
                    <button type="button" id="createProductModalButton" data-modal-target="createProductModal"
                        data-modal-toggle="createProductModal"
                        class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition">
                        Tambah Modul
                    </button>
                </div>

                <div class="overflow-x-auto">
                    <table
                        class="table-auto w-full text-left border border-gray-300 shadow-lg rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gradient-to-r from-indigo-400 via-blue-500 to-blue-800 text-white">
                                <th class="px-6 py-3 text-sm font-semibold tracking-wide uppercase">#</th>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wide uppercase">Judul Modul</th>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wide uppercase">Pelajaran</th>
                                <th class="px-6 py-3 text-sm font-semibold tracking-wide uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($moduls as $modul)
                                <tr class="hover:bg-gray-100 transition duration-200 ease-in-out">
                                    <td class="px-6 py-3 text-gray-800">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-3 text-gray-800 font-medium">{{ $modul->judul }}</td>
                                    <td class="px-6 py-3 text-gray-800">
                                        {{ $modul->pelajaran->pluck('judul')->join(', ') }}
                                    </td>
                                    <td class="px-6 py-3">
                                        <div class="flex space-x-3">
                                            <!-- Tombol Edit -->
                                            <button type="button"
                                                data-modal-target="updateProductModal-{{ $modul->id }}"
                                                data-modal-toggle="updateProductModal-{{ $modul->id }}"
                                                class="inline-flex items-center bg-yellow-500 text-white px-4 py-2 rounded shadow hover:bg-yellow-600 transition">
                                                Edit
                                            </button>
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('admin.modul.destroy', $modul->id) }}" method="POST"
                                                class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center bg-red-500 text-white px-4 py-2 rounded shadow hover:bg-red-600 transition"
                                                    onclick="return confirm('Yakin ingin menghapus modul ini?')">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-3 text-center text-gray-500">Belum ada data modul.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- Create modal -->
    <div id="createProductModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-50 sm:p-5">
                <!-- Modal header -->
                <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Modul</h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                        data-modal-target="createProductModal" data-modal-toggle="createProductModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                {{-- Memuat CSS Select2 --}}
                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
                    rel="stylesheet" />

                <form action="{{ route('admin.modul.store') }}" method="POST">
                    @csrf

                    <!-- Input Judul Modul -->
                    <div class="flex flex-col mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Modul</label>
                        <input type="text" name="judul" id="judul"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan judul modul" value="{{ old('judul') }}" required>
                    </div>

                    <!-- Input Pelajaran dengan Select2 -->
                    <div class="flex flex-col mb-4">
                        <label for="pelajaran" class="block text-sm font-medium text-gray-700">Pelajaran</label>
                        <select name="pelajaran[]" id="pelajaran" multiple
                            class="select2 p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @foreach ($pelajarans as $pelajaran)
                                <option value="{{ $pelajaran->id }}"
                                    {{ collect(old('pelajaran'))->contains($pelajaran->id) ? 'selected' : '' }}>
                                    {{ $pelajaran->judul }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end">
                        <a href="{{ route('admin.modul.index') }}"
                            class="py-3 px-4 inline-flex items-center
                            gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white
                            hover:bg-red-600">
                            Batal
                        </a>
                        <button type="submit"
                            class="ml-4 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700 ">
                            Simpan
                        </button>
                    </div>
                </form>

                {{-- Memuat JS jQuery dan Select2 --}}
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#pelajaran').select2({
                            placeholder: "Pilih pelajaran",
                            allowClear: true
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <!-- Update modal -->
    @foreach ($moduls as $modul)
        <div id="updateProductModal-{{ $modul->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-50 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-800">Edit Modul</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-100 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="updateProductModal-{{ $modul->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    {{-- Memuat CSS Select2 --}}
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
                        rel="stylesheet" />

                    <form action="{{ route('admin.modul.update', $modul->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Input Judul Modul -->
                        <div class="mb-4">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Modul</label>
                            <input type="text" name="judul" id="judul"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan judul modul" value="{{ old('judul', $modul->judul) }}"
                                required>
                        </div>

                        <!-- Input Pelajaran dengan Select2 -->
                        <div class="mb-4">
                            <label for="pelajaran" class="block text-sm font-medium text-gray-700">Pelajaran</label>
                            <select name="pelajaran[]" id="pelajaran" class="select2 w-full" multiple>
                                @foreach ($pelajarans as $pelajaran)
                                    <option value="{{ $pelajaran->id }}"
                                        {{ in_array($pelajaran->id, $modul->pelajaran->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $pelajaran->judul }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="flex justify-end">
                            <a href="{{ route('admin.modul.index') }}"
                                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">
                                Batal
                            </a>
                            <button type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
                                Perbarui
                            </button>
                        </div>
                    </form>

                    {{-- Memuat JS jQuery dan Select2 --}}
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            // Inisialisasi Select2 untuk Create Modal
                            $('#pelajaran').select2({
                                placeholder: "Pilih pelajaran",
                                allowClear: true
                            });

                            // Inisialisasi ulang Select2 untuk Update Modal setiap kali modal dibuka
                            $('[data-modal-toggle]').on('click', function() {
                                let modalId = $(this).data('modal-target');
                                $(`#${modalId} .select2`).select2({
                                    placeholder: "Pilih pelajaran",
                                    allowClear: true
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    @endforeach
</x-admin>
