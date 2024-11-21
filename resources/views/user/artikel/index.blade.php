<x-user>
    <!-- Container -->
    <div class="max-w-7xl mx-auto p-4">

        <!-- Headline Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Main Featured Article -->
            <div class="group w-[800px] rounded-lg md:col-span-2 relative overflow-hidden">
                <a href="{{ route('user.artikel.show', ['slug' => $lastData->slug]) }}">
                    <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $lastData->tumbnail) }}" alt="Concert"
                        class="w-[800px] h-[450px] object-cover rounded-lg transition-transform duration-300 group-hover:scale-105">
                </a>
                <div class="absolute inset-0 flex items-end rounded-lg">
                    <div class="w-full bg-black bg-opacity-50 p-4">
                        <a href="{{ route('user.artikel.show', ['slug' => $lastData->slug]) }}">
                            <h2
                                class="text-white text-2xl md:text-4xl font-bo                          ld hover:underline">
                                {{ $lastData->title }}</h2>
                        </a>
                        <p class="text-sm text-gray-100 mt-2">By {{ $lastData->user->nama }} |
                            {{ $lastData->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Article Sidebar Items -->
                <div class="flex items-center space-x-4">
                    <img src="https://source.unsplash.com/100x100/?concert" class="w-20 h-20 object-cover rounded-lg"
                        alt="Concert">
                    <div>
                        <span class="bg-red-200 text-red-800 text-xs font-bold py-1 px-2 rounded">CONCERT</span>
                        <p class="text-gray-800 font-semibold">Welcome To The Best Model Winner Contest</p>
                        <p class="text-xs text-gray-500 mt-2">By Michael Green | Nov 15, 2024</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="https://source.unsplash.com/100x100/?beach" class="w-20 h-20 object-cover rounded-lg"
                        alt="Beach">
                    <div>
                        <span class="bg-blue-200 text-blue-800 text-xs font-bold py-1 px-2 rounded">SEA BEACH</span>
                        <p class="text-gray-800 font-semibold">Enjoy the Best Sea Beach Experience</p>
                        <p class="text-xs text-gray-500 mt-2">By Michael Green | Nov 15, 2024</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="https://source.unsplash.com/100x100/?bike" class="w-20 h-20 object-cover rounded-lg"
                        alt="Bike Show">
                    <div>
                        <span class="bg-green-200 text-green-800 text-xs font-bold py-1 px-2 rounded">BIKE
                            SHOW</span>
                        <p class="text-gray-800 font-semibold">Join the Best Bike Show Event</p>
                        <p class="text-xs text-gray-500 mt-2">By Michael Green | Nov 15, 2024</p>
                    </div>
                </div>
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
