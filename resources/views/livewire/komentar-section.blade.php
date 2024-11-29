<div>
    <h2 class="text-lg lg:text-2xl font-bold text-[#f7f9fa] mb-4">Komentar</h2>

    @auth
        <form wire:submit.prevent="addComment" class="flex items-center border-t border-gray-600 bg-[#181818] py-3 px-4">
            <div class="relative flex-1">
                <input wire:model.defer="content"
                    class="w-full rounded-lg resize-none bg-transparent text-sm text-[#f7f9fa] placeholder-gray-500 p-2 border-b border-gray-600 focus:border-white focus:outline-none transition-all duration-200"
                    rows="1" placeholder="Tulis komentar...">
                @error('content')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit"
                class="ml-4 text-sm font-semibold text-blue-500 hover:text-blue-600 transition-all duration-200">
                Kirim
            </button>
        </form>
    @else
        <p class="mb-4 text-[#f7f9fa]">Silakan <a href="{{ route('login') }}" class="text-[#FCB16B]">login</a> untuk
            berkomentar.</p>
    @endauth

    <div class="space-y-4">
        @forelse ($komentars as $komentar)
            <div class="flex items-center [border-bottom:1px_solid_#424242] mb-4">
                <img src="{{ asset('storage/avatar/' . $komentar->user->avatar) }}" alt="Jese Leos"
                    class="w-12 h-12 rounded-full">
                <div class="p-4 pl-2 rounded-lg shadow">
                    <p class="font-semibold text-lg text-[#f7f9fa]">{{ $komentar->user->nama }}
                        <span class="text-sm text-gray-400"> . {{ $komentar->created_at->diffForHumans() }}</span>
                    </p>
                    <p class="text-[#f7f9fa]">{{ $komentar->content }}</p>
                </div>
            </div>
        @empty
            <p class="text-[#f7f9fa]">Belum ada komentar...</p>
        @endforelse
    </div>
</div>
