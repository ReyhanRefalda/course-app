<x-user>
    <!-- Container -->
    <div class="max-w-7xl mx-auto p-4">
        <!-- Headline Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 mb-6 bg-white rounded-lg shadow">
            <!-- Main Featured Article -->
            <div class="group sm:w-[90%] md:w-[800px] m-4 rounded-lg md:col-span-2 relative overflow-hidden">
                <a href="{{ route('user.artikel.show', ['slug' => $lastData->slug]) }}">
                    <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $lastData->tumbnail) }}"
                        alt="{{ $lastData->title }}"
                        class="sm:w-[90%] md:w-[800px] md:h-[450px] object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                </a>
                <div class="absolute inset-0 flex items-end rounded-lg">
                    <div class="w-full bg-black bg-opacity-50 p-4">
                        <a href="{{ route('user.artikel.show', ['slug' => $lastData->slug]) }}">
                            <h2 class="text-white text-2xl md:text-4xl font-semibold hover:underline">
                                {{ $lastData->title }}</h2>
                        </a>
                        <div class="flex gap-8">
                            <p class="sm:text-[8px] md:text-lg text-yellow-500 mt-2 font-bold">Berita Terbaru</p>
                            <p class="sm:text-[8px] md:text-lg text-gray-100 mt-2 font-semibold">By
                                {{ $lastData->user->nama }}</p>
                            <p class="sm:text-[8px] md:text-lg text-gray-100 mt-2 font-semibold">
                                {{ $lastData->created_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6 m-4">
                <!-- Article Sidebar Items -->
                @foreach ($secondToFifthData as $secondToFifthData)
                    <div>
                        <a href="{{ route('user.artikel.show', ['slug' => $secondToFifthData->slug]) }}"
                            class="flex  space-x-4 overflow-hidden rounded-lg">
                            <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $secondToFifthData->tumbnail) }}"
                                class="w-20 h-20 object-cover rounded-lg transition-transform duration-300 hover:scale-105"
                                alt="{{ $secondToFifthData->title }}">
                            <div>
                                <p class="text-lg text-gray-900 font-semibold hover:underline">
                                    {{ $secondToFifthData->title }}</p>
                                <p class="text-xs text-gray-500 mt-2"><span class="font-semibold">By
                                        {{ $secondToFifthData->user->nama }}</span> |
                                    {{ $secondToFifthData->created_at->diffForHumans() }}</p>
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
                    date="{{ $artikel->created_at->diffForHumans() }}" user="{{ $artikel->user->nama }}"
                    link="{{ route('user.artikel.show', ['slug' => $artikel->slug]) }}" />
            @endforeach
        </div>
        {!! $artikels->links() !!}
    </div>
</x-user>
