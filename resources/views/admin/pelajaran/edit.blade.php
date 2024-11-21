<x-admin>
    <x-slot name="title">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            Edit Pelajaran
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 bg-white rounded-lg shadow-md border border-gray-200">
                {{-- Form Edit Pelajaran --}}
                <form action="{{ route('admin.pelajaran.update', $pelajaran->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Input Judul -->
                    <div class="flex flex-col gap-2">
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                        <input type="text" name="judul" id="judul"
                            class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('judul') border-red-500 @enderror"
                            value="{{ old('judul', $pelajaran->judul) }}" placeholder="Masukkan judul pelajaran">
                        @error('judul')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Video URL -->
                    <div class="flex flex-col gap-2">
                        <label for="video_url" class="block text-sm font-medium text-gray-700">Video URL</label>
                        <input type="text" name="video_url" id="video_url"
                            class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('video_url') border-red-500 @enderror"
                            value="{{ old('video_url', $pelajaran->video_url) }}" placeholder="Masukkan URL video">
                        @error('video_url')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Input Konten -->
                    <div class="flex flex-col gap-2">
                        <label for="konten" class="block text-sm font-medium text-gray-700">Konten</label>
                        <textarea name="konten" id="konten" rows="5"
                            class="p-3 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('konten') border-red-500 @enderror"
                            placeholder="Masukkan konten pelajaran">{{ old('konten', $pelajaran->konten) }}</textarea>
                        @error('konten')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-end">
                        <a href="{{ route('admin.pelajaran.index') }}"
                            class="px-4 py-2 text-sm bg-gray-500 hover:bg-gray-600 text-white font-bold rounded-lg shadow-md">
                            Batal
                        </a>
                        <button type="submit"
                            class="ml-3 px-4 py-2 text-sm bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-lg shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Perbarui
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
