<x-user title="Artikel">
    <!-- Container -->
    <div class="max-w-7xl mx-auto p-4 [border-bottom:1px_solid_#606060]">
        {{-- social media --}}
        <div
            class="animate-fancy-gradient mx-[20px] px-6 py-3 rounded-lg flex justify-between items-center leading-[170%] animate-fancy-gradient bg-gradient-to-b from-[#B05CB0] via-[#FCB16B] to-[#B05CB0]">
            <div class="flex items-center gap-6">
                <h3 class="text-xl font-semibold text-[#f7f9fa] [letter-spacing:3px;]">FOLLOW US</h3>
                <a href="#">
                    <img src="{{ asset('aset/socialmedia/instagram-logo.png') }}" alt="instagram"
                        class="w-12 h-12 p-1 rounded-full [border:1px_solid_#404040] hover:[border:1px_solid_#f7f9fa] hover:bg-[#f7f9fa] transition-all duration-300">
                </a>
                <a href="#">
                    <img src="{{ asset('aset/socialmedia/facebook-logo.png') }}" alt="facebook"
                        class="w-12 h-12 p-1 rounded-full [border:1px_solid_#404040] hover:[border:1px_solid_#f7f9fa] hover:bg-[#f7f9fa] transition-all duration-300">
                </a>
                <a href="#">
                    <img src="{{ asset('aset/socialmedia/X-logo.png') }}" alt="X"
                        class="w-12 h-12 p-1 rounded-full [border:1px_solid_#404040] hover:[border:1px_solid_#f7f9fa] hover:bg-[#f7f9fa] transition-all duration-300">
                </a>
                <a href="#">
                    <img src="{{ asset('aset/socialmedia/telegram-logo.png') }}" alt="telegram"
                        class="w-12 h-12 p-1 rounded-full [border:1px_solid_#404040] hover:[border:1px_solid_#f7f9fa] hover:bg-[#f7f9fa] transition-all duration-300">
                </a>
            </div>
            <div class="flex items-center gap-4">
                <form action="{{ route('user.artikel.index') }}" method="GET"
                    class="flex items-center max-w-sm mx-auto">
                    <div class="relative w-full">
                        <input type="text" name="search" id="search" placeholder="Cari berita..."
                            class="block w-full px-4 py-2 text-[#f7f9fa] bg-[#181818] [border:2px_solid_#f7f9fa] rounded-lg focus:ring-[#B05CB0] focus:border-[#f7f9fa] sm:text-sm"
                            value="{{ request('search') }}" />
                    </div>
                    <button type="submit"
                        class="p-2.5 ms-2 text-sm font-medium text-[#B05CB0] hover:text-[#f7f9fa] bg-[#f7f9fa] rounded-lg border border-[#f7f9fa] hover:border-[#B05CB0] hover:bg-[#B05CB0] focus:ring-4 focus:outline-none focus:ring-blue-300 transition-all duration-300">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>
            </div>
        </div>


        <!-- Headline Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 mb-6 bg-[#181818] shadow [border-bottom:1px_solid_#404040]">
            <!-- Main Featured Article -->
            @if ($lastData)
                <div class="group sm:w-[90%] md:w-[800px] m-4 rounded-lg md:col-span-2 relative overflow-hidden">
                    <a href="{{ route('user.artikel.show', ['slug' => $lastData->slug]) }}">
                        <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $lastData->tumbnail) }}"
                            alt="{{ $lastData->title }}"
                            class="sm:w-[90%] md:w-[800px] md:h-[450px] object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                    </a>
                    <div class="absolute inset-0 flex items-end rounded-lg">
                        <div class="w-full bg-black bg-opacity-50 p-4">
                            <a href="{{ route('user.artikel.show', ['slug' => $lastData->slug]) }}">
                                <h2 class="text-[#f7f9fa] text-2xl md:text-4xl font-semibold hover:underline">
                                    {{ $lastData->title }}</h2>
                            </a>
                            <div class="flex gap-8">
                                <p class="sm:text-[8px] md:text-lg text-yellow-500 mt-2 font-bold">Berita Terbaru</p>
                                <p class="sm:text-[8px] md:text-lg text-[#f7f9fa] mt-2 font-semibold">By
                                    {{ $lastData->user->nama }}</p>
                                <p class="sm:text-[8px] md:text-lg text-[#f7f9fa] mt-2 font-semibold">
                                    @if ($lastData->created_at->diffInHours(now()) < 24)
                                        {{ $lastData->created_at->diffForHumans() }}
                                    @else
                                        {{ $lastData->created_at->isoFormat('dddd, D MMMM Y') }}
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center text-gray-500 p-4">
                    <p>Tidak ada artikel yang tersedia saat ini.</p>
                </div>
            @endif

            <!-- Sidebar -->
            <div class="space-y-6 m-4">
                <!-- Article Sidebar Items -->
                @foreach ($secondToFifthData as $secondToFifthData)
                    <div class="mb-2 pb-2">
                        <a href="{{ route('user.artikel.show', ['slug' => $secondToFifthData->slug]) }}"
                            class="flex space-x-4 overflow-hidden rounded-lg">
                            <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $secondToFifthData->tumbnail) }}"
                                class="w-20 h-20 object-cover rounded-lg transition-transform duration-300 hover:scale-105"
                                alt="{{ $secondToFifthData->title }}">
                            <div>
                                <p class="text-lg text-[#f7f9fa] font-semibold hover:underline">
                                    {{ $secondToFifthData->title }}</p>
                                <p class="text-xs text-gray-300 mt-2">
                                    <span class="font-semibold">By {{ $secondToFifthData->user->nama }}</span> |
                                    @if ($secondToFifthData->created_at->diffInHours(now()) < 24)
                                        {{ $secondToFifthData->created_at->diffForHumans() }}
                                    @else
                                        {{ $secondToFifthData->created_at->isoFormat('dddd, D MMMM Y') }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-4">
            @foreach ($artikels as $artikel)
                <x-artikel-list title="{{ $artikel->title }}"
                    image="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail) }}"
                    user="{{ $artikel->user->nama }}"
                    link="{{ route('user.artikel.show', ['slug' => $artikel->slug]) }}" :date="$artikel->created_at" />
            @endforeach
        </div>
        {!! $artikels->links() !!}
    </div>

</x-user>
