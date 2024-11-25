@props(['title', 'date', 'user', 'link', 'image'])
<div>
    <div class="min-h-[340px] bg-white rounded-lg shadow overflow-hidden">
        <a href="{{ $link }}">
            <img src="{{ $image }}"
                class="w-full h-[190px] object-cover hover:scale-105 transition duration-300"
                alt="{{ $title }}">
        </a>
        <div class="h-[150px] flex flex-col justify-between p-2 overflow-y-hidden">
            <a href="{{ $link }}" class="hover:underline">
                <h3 class="text-[1.3rem] font-bold">{{ $title }}</h3>
            </a>
            <div class="flex justify-between">
                <p class="text-sm text-gray-800 font-semibold">By {{ $user }}</p>
                <p class="text-sm text-gray-800">{{ $date }}</p>
            </div>
        </div>
    </div>
</div>
