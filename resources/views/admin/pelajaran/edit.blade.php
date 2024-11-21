<x-admin>
    <x-slot name="title">Edit Pelajaran</x-slot>

    <div class="card">
        <div class="card-header">Form Edit Pelajaran</div>
        <div class="card-body">
            <form action="{{ route('admin.pelajaran.update', $pelajaran->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul</label>
                    <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $pelajaran->judul) }}">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="video_url" class="form-label">Video URL</label>
                    <input type="url" name="video_url" id="video_url" class="form-control @error('video_url') is-invalid @enderror" value="{{ old('video_url', $pelajaran->video_url) }}">
                    @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea name="konten" id="konten" rows="5" class="form-control @error('konten') is-invalid @enderror">{{ old('konten', $pelajaran->konten) }}</textarea>
                    @error('konten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('admin.pelajaran.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</x-admin>
