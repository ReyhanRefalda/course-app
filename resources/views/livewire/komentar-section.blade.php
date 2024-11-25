<div>
    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 mb-4">Komentar</h2>

    @auth
        <form wire:submit.prevent="addComment" class="mb-6">
            <textarea wire:model="content" class="py-2 px-4 mb-4 rounded-lg border w-full text-sm text-gray-900 bg-gray-100"
                rows="4" placeholder="Tulis Komentar anda..." required></textarea>
            @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
            <button type="submit"
                class="inline-flex items-center py-2 px-4 text-xs font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Kirim
            </button>
        </form>
    @else
        <p class="mb-4 text-gray-600">Silakan <a href="{{ route('login') }}" class="text-blue-500">login</a> untuk
            berkomentar.</p>
    @endauth

    <div class="space-y-4">
        @forelse ($komentars as $komentar)
            <div class="p-4 bg-white rounded-lg shadow">
                <p class="font-semibold">{{ $komentar->user->nama }}</p>
                <p class="text-sm text-gray-600">{{ $komentar->created_at->diffForHumans() }}</p>
                <p class="mt-2">{{ $komentar->content }}</p>
            </div>
        @empty
            <p class="text-gray-600">Belum ada komentar.</p>
        @endforelse
    </div>
</div>
