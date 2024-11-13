<x-app-layout>
<div class="container">
    <h1>Edit Artikel</h1>
    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $artikel->judul }}" required>
        </div>
        <div class="form-group mt-3">
            <label for="isi">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required>{{ $artikel->isi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
</x-app-layout>