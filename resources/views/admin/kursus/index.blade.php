<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900"><b>/ DAFTAR
                KURSUS</b></span>
    </h1>

    <div class="w-full flex justify-between items-center mb-4 space-x-4">
        <button type="button" id="createProductModalButton" data-modal-target="createProductModal"
            data-modal-toggle="createProductModal"
            class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Tambah
            Kursus</button>
        <div class="w-full max-w-md">
            <form action="{{ route('admin.kursus.index') }}" method="GET">
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Cari data kursus..."
                        value="{{ request('search') }}"
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


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($kursus as $item)
            <div
                class="relative p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <!-- Judul Kursus -->
                <h3 class="text-lg font-bold text-blue-600 mb-2">
                    {{ $item->judul }}
                </h3>

                <!-- Modul -->
                <p class="text-sm text-gray-600 mb-2">
                    <span class="font-semibold">Modul:</span> {{ $item->modul->pluck('judul')->join(', ') }}
                </p>

                <!-- Deskripsi -->
                <p class="text-sm text-gray-600 mb-2">
                    <span class="font-semibold">Deskripsi:</span> {{ Str::limit($item->deskripsi, 80, '...') }}
                </p>

                <!-- Harga -->
                <p class="text-sm font-semibold text-gray-800 mb-4">
                    Harga: <span class="text-blue-600">Rp {{ number_format($item->harga, 2, ',', '.') }}</span>
                </p>

                <!-- Tanggal Pembuatan -->
                <p class="text-xs text-gray-500 mb-4">
                    Dibuat pada:
                    {{ $item->created_at ? $item->created_at->isoFormat('dddd, D MMMM Y') : 'Tanggal tidak tersedia' }}
                </p>

                <!-- Tombol Aksi -->
                <div class="flex justify-start items-center gap-2">
                    <button type="button" data-modal-target="updateProductModal-{{ $item->id }}"
                        data-modal-toggle="updateProductModal-{{ $item->id }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                        Edit
                    </button>
                    <button type="button" data-modal-target="deleteModal-{{ $item->id }}"
                        data-modal-toggle="deleteModal-{{ $item->id }}"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border border-transparent bg-red-500 text-white hover:bg-red-600">
                        Hapus
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="py-4">
        {{-- {!! $kursus->links() !!} --}}
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
                    <h3 class="text-lg font-semibold text-gray-900">Tambah Pelajaran</h3>
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

                <form action="{{ route('admin.kursus.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('POST')

                    <!-- Input Judul -->
                    <div class="flex flex-col mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="title" value="{{ old('judul') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan judul kursus" autofocus>
                        <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                    </div>

                    <!-- Input Modul -->
                    <div class="flex flex-col mb-4">
                        <label for="modul_id" class="block text-sm font-medium text-gray-700">Modul</label>
                        <select name="modul_id[]" id="modul_id" multiple
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            @foreach ($moduls as $modul)
                                <option value="{{ $modul->id }}"
                                    {{ in_array($modul->id, $selectedModuls) ? 'selected' : '' }}>
                                    {{ $modul->judul }}
                                </option>
                            @endforeach
                        </select>


                        <x-input-error class="mt-2" :messages="$errors->get('modul_id')" />
                    </div>

                    <!-- Input Deskripsi -->
                    <div class="flex flex-col mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                        <textarea name="deskripsi" id="description" rows="4"
                            class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan deskripsi kursus">{{ old('deskripsi') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                    </div>

                    <!-- Input Harga -->
                    <div class="flex flex-col mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                        <input type="number" name="harga" id="price" value="{{ old('harga') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan harga kursus">
                        <x-input-error class="mt-2" :messages="$errors->get('harga')" />
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
                        $('#modul_id').select2({
                            placeholder: "Pilih modul",
                            allowClear: true
                        });
                    });
                </script>
            </div>
        </div>
    </div>

    <!-- Update modal -->
    @foreach ($kursus as $item)
        <div id="updateProductModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-50 sm:p-5">
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900">Edit Kursus</h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-target="updateProductModal-{{ $item->id }}"
                            data-modal-toggle="updateProductModal-{{ $item->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ route('admin.kursus.update', $item->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Input Judul -->
                        <div class="flex flex-col mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                            <input type="text" name="judul" id="title"
                                value="{{ old('judul', $item->judul) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan judul kursus">
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>

                        <!-- Input Modul -->
                        <div class="flex flex-col mb-4">
                            <label for="modul_id" class="block text-sm font-medium text-gray-700">Modul</label>
                            <select id="modul_id" name="modul[]" class="form-control" multiple>
                                @foreach($moduls as $modul)
                                    <option value="{{ $modul->id }}" 
                                        {{ in_array($modul->id, $selectedModuls) ? 'selected' : '' }}>
                                        {{ $modul->name }}
                                    </option>
                                @endforeach
                            </select>
                            
                            <x-input-error class="mt-2" :messages="$errors->get('modul_id')" />
                        </div>

                        <!-- Input Deskripsi -->
                        <div class="flex flex-col mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                            <textarea name="deskripsi" id="description" rows="4"
                                class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan deskripsi kursus">{{ old('deskripsi', $item->deskripsi) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                        </div>

                        <!-- Input Harga -->
                        <div class="flex flex-col mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                            <input type="number" name="harga" id="price"
                                value="{{ old('harga', $item->harga) }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                placeholder="Masukkan harga kursus">
                            <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                        </div>

                        <div class="flex justify-end">
                            <button type="button" data-modal-target="updateProductModal-{{ $item->id }}"
                                data-modal-toggle="updateProductModal-{{ $item->id }}"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border bg-red-500 text-white hover:bg-red-600">
                                Batal
                            </button>
                            <button type="submit"
                                class="ml-4 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-semibold rounded-md border bg-blue-600 text-white hover:bg-blue-700">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Delete modal -->
    @foreach ($kursus as $item)
        <div id="deleteModal-{{ $item->id }}" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-50 sm:p-5">
                    <button type="button"
                        class="text-gray-700 absolute top-2.5 right-2.5 bg-transparent hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center  dark:hover:text-gray-900"
                        data-modal-toggle="deleteModal-{{ $item->id }}">
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
                    <p class="mb-4 text-gray-500 dark:text-gray-800">Apakah anda yakin untuk menghapus kursus ini?
                    </p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="deleteModal-{{ $item->id }}" type="button"
                            class="py-2 px-3 text-sm font-medium text-white bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 hover:text-white-900 focus:z-10 dark:bg-blue-500 dark:text-white dark:border-blue-500 dark:hover:text-white dark:hover:bg-blue-800 dark:focus:ring-blue-800">Batalkan</button>
                        <form action="{{ route('admin.kursus.destroy', $item->id) }}" method="POST">
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

    <script>
        $(document).ready(function() {
            $('#modul_id').select2({
                placeholder: "Pilih modul",
                allowClear: true
            });
        });
    </script>


</x-admin>
