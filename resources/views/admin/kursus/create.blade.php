<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN / DAFTAR KURSUS <span class="text-gray-900"><b>/
                TAMBAH KURSUS</b></span>
    </h1>

    {{-- form create artikel --}}
    <form action="{{ route('admin.kursus.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="title" class="block text-gray-800 font-semibold">Judul</label>
                    <input type="text" name="judul" id="title" value="{{ old('judul') }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        autofocus>
                    <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="block text-gray-800 font-semibold">Deskripsi</label>
                    <input type="text" name="deskripsi" id="description" value="{{ old('deskripsi') }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="price" class="block text-gray-800 font-semibold">Harga</label>
                    <input type="number" name="harga" id="price" value="{{ old('harga') }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error class="mt-2" :messages="$errors->get('harga')" />
                </div>
                {{-- modul input --}}
                <div class="flex flex-col gap-2">
                    <label for="modul_id" class="block text-gray-800 font-semibold">Modul</label>
                    <select name="modul_id" id="modul_id"
                        class="p-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="0">Pilih Modul</option>
                        @foreach ($moduls as $modul)
                            <option value="{{ $modul->id }}">{{ $modul->judul }}</option>
                        @endforeach
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('modul_id')" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Simpan
        </button>
    </form>

</x-admin>
