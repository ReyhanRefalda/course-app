<x-app-layout>
<div class="container">
    <h1>Buat Artikel Baru</h1>
    <form action="{{ route('admin.artikel.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="isi">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="5" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
</x-app-layout>
