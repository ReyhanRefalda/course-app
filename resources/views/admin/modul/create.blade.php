<x-admin>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Tambah Modul') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-lg p-6">
                {{-- Memuat CSS Select2 --}}
                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

                <form action="{{ route('admin.modul.store') }}" method="POST">
                    @csrf

                    <!-- Input Judul Modul -->
                    <div class="mb-4">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Modul</label>
                        <input type="text" name="judul" id="judul"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Masukkan judul modul" value="{{ old('judul') }}">
                        @error('judul')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Pelajaran dengan Select2 -->
                    <div class="mb-4">
                        <label for="pelajaran" class="block text-sm font-medium text-gray-700">Pelajaran</label>
                        <select name="pelajaran[]" id="pelajaran" multiple class="select2 w-full">
                            @foreach ($pelajarans as $pelajaran)
                                <option value="{{ $pelajaran->id }}"
                                    {{ collect(old('pelajaran'))->contains($pelajaran->id) ? 'selected' : '' }}>
                                    {{ $pelajaran->judul }}
                                </option>
                            @endforeach
                        </select>
                    
                        {{-- Error untuk array pelajaran --}}
                        @error('pelajaran')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                        @foreach ($errors->get('pelajaran.*') as $messages)
                            @foreach ($messages as $message)
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @endforeach
                        @endforeach
                    </div>
                    

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end">
                        <a href="{{ route('admin.modul.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded mr-2">
                            Batal
                        </a>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow">
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
</x-admin>
