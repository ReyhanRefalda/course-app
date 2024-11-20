<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900"><b>/ EDIT KURSUS</b></span></h1>

    <form action="{{ route('admin.kursus.update', $kursus->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Form Input Judul --}}
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul Kursus</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $kursus->judul) }}" 
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan judul kursus" required>
            @error('judul')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Form Input Deskripsi --}}
        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea id="deskripsi" name="deskripsi" rows="4"
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan deskripsi kursus" required>{{ old('deskripsi', $kursus->deskripsi) }}</textarea>
            @error('deskripsi')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Form Input Harga --}}
        <div class="mb-4">
            <label for="harga" class="block text-sm font-medium text-gray-700">Harga Kursus</label>
            <input type="number" id="harga" name="harga" value="{{ old('harga', $kursus->harga) }}" 
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                placeholder="Masukkan harga kursus" min="0" required>
            @error('harga')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Form Pilihan Modul --}}
        <div class="mb-4">
            <label for="modul_id" class="block text-sm font-medium text-gray-700">Pilih Modul</label>
            <select id="modul_id" name="modul_id[]" multiple
                class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                @foreach ($moduls as $modul)
                    <option value="{{ $modul->id }}" 
                        {{ in_array($modul->id, $kursus->modul->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $modul->judul }}
                    </option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500 mt-1">Pilih satu atau lebih modul untuk kursus ini.</p>
            @error('modul_id')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol Submit --}}
        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
                Simpan Perubahan
            </button>
        </div>
    </form>
</x-admin>
