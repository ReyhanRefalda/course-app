<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900"><b>/ DAFTAR
                KURSUS</b></span>
    </h1>

    <div class="w-full flex justify-between items-center mb-4 space-x-4">
        <a href="{{ route('admin.kursus.create') }}"
            class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Tambah Kursus
        </a>
        <div class="w-full max-w-md">
            <form action="{{ route('admin.kursus.index') }}" method="GET">
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Cari data kursus..."
                        value="{{ request('search') }}"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
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
        <div class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 rounded-lg"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewbox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                {{ session('success') }}
            </div>
            <button type="button"
                class="ms-auto bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8"
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
                class="p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                <h3 class="text-lg font-bold text-blue-600 mb-2">
                    {{ $item->judul }}
                </h3>
                <p class="text-sm text-gray-600 mb-2">
                    <span class="font-semibold">Modul:</span> {{ $item->modul->pluck('judul')->join(', ') }}
                </p>
                <p class="text-sm text-gray-600 mb-2">
                    <span class="font-semibold">Deskripsi:</span> {{ Str::limit($item->deskripsi, 80, '...') }}
                </p>
                <p class="text-sm font-semibold text-gray-800 mb-4">
                    Harga: <span class="text-blue-600">Rp {{ number_format($item->harga, 2, ',', '.') }}</span>
                </p>
                <p class="text-xs text-gray-500 mb-4">
                    Dibuat pada:
                    {{ $item->created_at ? $item->created_at->isoFormat('dddd, D MMMM Y') : 'Tanggal tidak tersedia' }}
                </p>
                <div class="flex justify-start items-center gap-2">
                    <a href="{{ route('admin.kursus.edit', $item->id) }}"
                        class="py-2 px-3 text-sm font-semibold rounded-md bg-blue-600 text-white hover:bg-blue-700">
                        Edit
                    </a>
                    <form action="{{ route('admin.kursus.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="py-2 px-3 text-sm font-semibold rounded-md bg-red-500 text-white hover:bg-red-600">
                            Hapus
                        </button>


                    </div>

                    {{-- Memuat CSS Select2 --}}
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
                        rel="stylesheet" />

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
        @endforeach
    </div>

    <div class="py-4">
        {{-- {{ $kursus->links() }} --}}
    </div>
</x-admin>
