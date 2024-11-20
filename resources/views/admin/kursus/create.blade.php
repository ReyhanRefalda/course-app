<x-admin>
    <h1 class="text-lg mb-6 text-gray-500 text-start">DASHBOARD ADMIN / DAFTAR KURSUS
        <span class="text-gray-900 font-bold">/ TAMBAH KURSUS</span>
    </h1>

    {{-- Memuat CSS Select2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />


   
    <form action="{{ route('admin.kursus.store') }}" method="POST" enctype="multipart/form-data"
        class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
        @csrf
        @method('POST')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Input Judul -->
            <div class="flex flex-col gap-2">
                <label for="title" class="block text-gray-800 font-semibold">Judul</label>
                <input type="text" name="judul" id="title" value="{{ old('judul') }}"
                    class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan judul kursus" autofocus>
                <x-input-error class="mt-2" :messages="$errors->get('judul')" />
            </div>

            <!-- Input Deskripsi -->
            <div class="flex flex-col gap-2">
                <label for="description" class="block text-gray-800 font-semibold">Deskripsi</label>
                <textarea name="deskripsi" id="description" rows="4"
                    class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan deskripsi kursus">{{ old('deskripsi') }}</textarea>
                <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
            </div>

            <!-- Input Harga -->
            <div class="flex flex-col gap-2">
                <label for="price" class="block text-gray-800 font-semibold">Harga</label>
                <input type="number" name="harga" id="price" value="{{ old('harga') }}"
                    class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan harga kursus">
                <x-input-error class="mt-2" :messages="$errors->get('harga')" />
            </div>

            <!-- Input Modul -->
            <div class="flex flex-col gap-2">
                <label for="modul_id" class="block text-gray-800 font-semibold">Modul</label>
                <select name="modul_id[]" id="modul_id" multiple
                    class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @foreach ($moduls as $modul)
                        <option value="{{ $modul->id }}" 
                            {{ collect(old('modul_id'))->contains($modul->id) ? 'selected' : '' }}>
                            {{ $modul->judul }}
                        </option>
                    @endforeach
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('modul_id')" />
            </div>

        </div>

        <!-- Tombol Simpan -->
        <div class="flex justify-end mt-6">
            <button type="submit"
                class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
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
</x-admin>