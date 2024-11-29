<x-admin>
<div class="min-h-screen p-6 bg-gray-100 flex items-center justify-center">
    <div class="container max-w-screen-lg mx-auto">
        <div>
            <h2 class="font-semibold text-xl text-gray-600">Tambah Kursus</h2>
            <p class="text-gray-500 mb-6">Silakan isi semua field di bawah ini.</p>

            <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
                <form action="{{ route('admin.kursus.store') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                        <div class="text-gray-600">
                            <p class="font-medium text-lg">Detail Kursus</p>
                            <p>Isi informasi kursus dengan lengkap.</p>
                        </div>

                        <div class="lg:col-span-2">
                            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                                <!-- Judul -->
                                <div class="md:col-span-5">
                                    <label for="judul">Judul Kursus</label>
                                    <input type="text" name="judul" id="judul" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('judul') }}" >
                                    @error('judul')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Deskripsi -->
                                <div class="md:col-span-5">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea name="deskripsi" id="deskripsi" class="h-28 border mt-1 rounded px-4 w-full bg-gray-50">{{ old('deskripsi') }}</textarea>
                                    @error('deskripsi')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Harga -->
                                <div class="md:col-span-5">
                                    <label for="harga">Harga (Rp)</label>
                                    <input type="number" name="harga" id="harga" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="{{ old('harga') }}" >
                                    @error('harga')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Modul -->
                                <div class="md:col-span-5">
                                    <label for="modul_id">Pilih Modul</label>
                                    <select name="modul_id[]" id="modul_id" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 select2" multiple>
                                        @foreach($moduls as $modul)
                                            <option value="{{ $modul->id }}" {{ in_array($modul->id, old('modul_id', [])) ? 'selected' : '' }}>{{ $modul->judul }}</option>
                                        @endforeach
                                    </select>
                                    @error('modul_id')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Tombol Submit -->
                                <div class="md:col-span-5 text-right">
                                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Tambah Kursus
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('.select2').select2({
            placeholder: 'Pilih modul',
            allowClear: true
        });
    });
</script>
</x-admin>
