<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN / DAFTAR ARTIKEL <span class="text-gray-900"><b>/
                EDIT
                ARTIKEL: {{ $artikel->title }}</b></span>
    </h1>

    {{-- form edit artikel --}}
    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="title" class="block text-gray-800 font-semibold">Judul</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $artikel->title) }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        autofocus>
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="block text-gray-800 font-semibold">Deskripsi</label>
                    <input type="text" name="description" id="description"
                        value="{{ old('description', $artikel->description) }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="content" class="block text-gray-800 font-semibold">Isi Artikel</label>
                    <input id="x" type="hidden" value="{!! old('content', $artikel->content) !!}" name="content">
                    <trix-editor input="x"
                        class="border-gray-300 rounded-lg bg-gray-50 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm min-h-80"></trix-editor>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="status" class="block text-gray-800 font-semibold">Status</label>
                    <select name="status" id="status"
                        class="p-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="draft" {{ old('status', $artikel->status) == 'draft' ? 'selected' : '' }}>
                            Draft</option>
                        <option value="publish" {{ old('status', $artikel->status) == 'publish' ? 'selected' : '' }}>
                            Publish</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="tumbnail" class="block text-gray-800 font-semibold">Tumbnail</label>
                    <input type="file" name="tumbnail" id="tumbnail"
                        class="w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @isset($artikel->tumbnail)
                        <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail) }}" alt="Artikel Thumbnail"
                            class="w-full h-48 object-cover rounded-lg">
                    @endisset
                    <x-input-error class="mt-2" :messages="$errors->get('tumbnail')" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Simpan Perubahan
        </button>
    </form>
</x-admin>
