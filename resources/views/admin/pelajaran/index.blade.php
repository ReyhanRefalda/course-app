<x-admin>
    <x-slot name="title">Daftar Pelajaran</x-slot>

    <div class="mb-4">
        <a href="{{ route('admin.pelajaran.create') }}" class="btn btn-primary">Tambah Pelajaran</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">Daftar Pelajaran</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Video URL</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pelajarans as $pelajaran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelajaran->judul }}</td>
                            <td>{{ $pelajaran->video_url ?? '-' }}</td>
                            <td>
                                <a href="{{ route('admin.pelajaran.edit', $pelajaran->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.pelajaran.destroy', $pelajaran->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada pelajaran.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>
