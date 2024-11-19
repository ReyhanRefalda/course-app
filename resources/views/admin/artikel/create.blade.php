<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN / DAFTAR ARTIKEL <span class="text-gray-900"><b>/
                TAMBAH ARTIKEL</b></span>
    </h1>

    {{-- form create artikel --}}
    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2">
                    <label for="title" class="block text-gray-800 font-semibold">Judul</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500"
                        autofocus>
                    <x-input-error class="mt-2" :messages="$errors->get('title')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="description" class="block text-gray-800 font-semibold">Deskripsi</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}"
                        class="p-2 w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="content" class="block text-gray-800 font-semibold">Isi Artikel</label>
                    <input id="x" type="hidden" value="{{ old('content') }}" name="content">
                    <trix-editor input="x"
                        class="border-gray-300 rounded-lg bg-gray-50 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm min-h-80"></trix-editor>
                    <x-input-error class="mt-2" :messages="$errors->get('content')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="status" class="block text-gray-800 font-semibold">Status</label>
                    <select name="status" id="status"
                        class="p-2 border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="publish" {{ old('status') == 'publish' ? 'selected' : '' }}>Publish</option>
                    </select>
                    <x-input-error class="mt-2" :messages="$errors->get('status')" />
                </div>
                <div class="flex flex-col gap-2">
                    <label for="tumbnail" class="block text-gray-800 font-semibold">Tumbnail</label>
                    <input type="file" name="tumbnail" id="tumbnail" value="{{ old('tumbnail') }}"
                        class="w-full border border-gray-300 rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <x-input-error class="mt-2" :messages="$errors->get('tumbnail')" />
                </div>
            </div>
        </div>
        <button type="submit"
            class="mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Simpan
        </button>
    </form>

</x-admin>
