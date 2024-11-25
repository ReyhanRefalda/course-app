<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900"><b>/ DAFTAR
                MODUL</b></span>
    </h1>

    <div class="w-full flex justify-between items-center mb-4 space-x-4">
        <button type="button" id="createProductModalButton" data-modal-target="createProductModal"
            data-modal-toggle="createProductModal"
            class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white font-bold py-2 px-4 rounded shadow-md hover:shadow-lg transition">
            Tambah Modul
        </button>

        <div class="w-full max-w-md">
            <form action="#" me thod="GET">
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Cari data modul..." value="{{ request('search') }}"
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

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-6">
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
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                                Edit
                                            </button>
                                            <button type="button" data-modal-target="deleteModal-{{ $modul->id }}"
                                                data-modal-toggle="deleteModal-{{ $modul->id }}"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600">
                                                Hapus
                                            </button>
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
                        <div class="flex flex-col mb-4">
                            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Modul</label>
                            <input type="text" name="judul" id="judul"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan judul modul" value="{{ old('judul', $modul->judul) }}"
                                required>
                        </div>

                        <!-- Input Pelajaran dengan Select2 -->
                        <div class="flex flex-col mb-4">
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


    <!-- Delete modal -->
    @foreach ($moduls as $modul)
        <div id="deleteModal-{{ $modul->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-50 sm:p-5">
                    <button type="button"
                        class="text-gray-700 absolute top-2.5 right-2.5 bg-transparent hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  dark:hover:text-gray-900"
                        data-modal-toggle="deleteModal-{{ $modul->id }}">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="text-gray-400 dark:text-red-500 w-11 h-11 mb-3.5 mx-auto" aria-hidden="true"
                        fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                            clip-rule="evenodd" />
                    </svg>
                    <p class="mb-4 text-gray-500 dark:text-gray-800">Apakah anda yakin untuk menghapus pelajaran ini?
                    </p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deleteModal-{{ $modul->id }}" type="button"
                            class="py-2 px-3 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-white-900 focus:z-10 dark:bg-blue-500 dark:text-white dark:border-blue-500 dark:hover:text-white dark:hover:bg-blue-800 dark:focus:ring-blue-800">Batalkan</button>
                        <form action="{{ route('admin.modul.destroy', $modul->id) }}" method="POST"
                            class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center bg-red-500 text-white px-3 py-2 rounded shadow hover:bg-red-600 transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</x-admin>
