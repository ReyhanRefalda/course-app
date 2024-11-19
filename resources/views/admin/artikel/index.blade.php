<x-admin>
    <h1 class="text-lg mb-4 text-gray-500 text-start">DASHBOARD ADMIN <span class="text-gray-900"><b>/ DAFTAR
                ARTIKEL</b></span>
    </h1>
    <div class="w-full flex justify-between items-center mb-4 space-x-4">
        <a href="{{ route('admin.artikel.create') }}"
            class="px-6 py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-300 ease-in-out">
            Tambah Artikel
        </a>
        <div class="w-full max-w-md">
            <form action="{{ route('admin.artikel.index') }}" me thod="GET">
                <div class="flex items-center space-x-2">
                    <input type="text" name="search" placeholder="Cari artikel" value="{{ request('search') }}"
                        class="w-full px-4 py-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-100 dark:text-gray-900 dark:border-gray-600 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-300 ease-in-out">
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded-md hover:bg-blue-700 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>


    @if (session('success'))
        <div id="alert-border-1"
            class="flex items-center p-4 mb-4 text-blue-800 border-t-4 border-blue-300 bg-blue-50 dark:border-blue-700 rounded-lg"
            role="alert">
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewbox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <div class="ms-3 text-sm font-medium">
                <span>{{ session('success') }}</span>
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 w-8 dark:text-blue-400"
                data-dismiss-target="#alert-border-1" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewbox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
    @endif

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg grid grid-cols-1 gap-4">
        @foreach ($artikels as $artikel)
            <div
                class="relative group bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-2xl hover:bg-opacity-75 transition-all duration-300">
                <div
                    class="overlay-layer w-full absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-70 transition-all duration-300 flex items-center justify-center">
                    <div
                        class="flex gap-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 [&>a]:w-8 [&>a]:mr-4">
                        <a href="{{ route('admin.artikel.show', $artikel->id) }}">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAACXBIWXMAAAsTAAALEwEAmpwYAAABtklEQVR4nO2U2SqFURTHP7cOx5QhUrhwbXgJlBcwJ4qT4S3wEqZcGl5AUhwSZQgXphBFuDPFzU+7/l+tdqfzHcOlVau+77+mvf577RUE//IbAXKAXmAJuAbepVfAItADxH6SOAsYAp6Ilkcg4WIyTV4JrJoEuypWB+RL64FhYM/4rQAVUclrgAsF3AFdGRyoFbhRjKOuNl3yezluAcWGrm5gA3iRJl3xkBagFNhWrMtR7SfPA47lsA5kG9t0Gv6njF9Mh3ByBMRtgTkZToACg3cIfwb6dNIyoF+Yk3bjXwicCZ8JwRYBH+4ivc42ZBtMQemgbEkPbwA+ZWsO1I6TsRRJXmUrSWErke0lhW08pMoWGP/DAhO2QLN+XFv136AoEQ6FhzcaippCcFbAqbso49zuXXJcai+5zfgXAefCp23VuKEqafcLMJVmTCe9Md0Ufgjk+i1Xm4fmHk2p8CyN67pO7XRN3YUPzY3ujtkAVT6ltkjY4v03VsVt5KowARVaXKHsAyOa7wKp+x4FDozfMlAedaDA0JLQKo6SB2Ag43XtFYppqS0Al8Cb1H3PA512b/1L8BP5AgqUrtNYKIXyAAAAAElFTkSuQmCC"
                                alt="visible">
                        </a>
                        <a href="{{ route('admin.artikel.edit', $artikel->id) }}">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAAB9UlEQVR4nO3ZT6tNURjH8Y0YUG7K4EQkf2b+lMxIKZkZue4bIHKvG0rGRDkMFJnIgDJjIO+ACWXkBZAZRqJLJq6PTq2T3bnXdc7aa+991PrWqtOp51m/73nWbp/dLopMJpPJJAATOIvzWF/8j2AL3vnDR+ys2nQFpnAfj4dYpxOInLSQT+jENuzgtdF4U0FgE9aEz70jNcjVmKbL8TI0eIsZHMHhf6xOheP0Hs+XkLkZ0/hoKO41n4gJFyHRpyxzIXw3h20xzW+FBpfqCL+ERJ8XJZlZHIzd4GFoOJk6/BASC2SqbNIXOZYs+WgSPb5h39iKYPPAfWIxvuNQis1qEWlUoi6RxiXqEGlFIrVIaxIpRVqVSCXSukQKkbGQqCqCjUPc7Oai/3Y0KLIKT1udRFURrC3JPGttEglELvefGxaZTHOTSCDyKtQNyjQvESuCdfhZmsC1ksyeog3EiUyWJD6EHhsSZNmPLzjelMgJXMRuLBt507+A6ZDlRjFuD1YjZpnOIvJE0iMfrSJf7GN5tB6E4qla0o2WZTZk6cYUd0PxlVrSjZblXshyLqb4QCj+jK21JBwux178wDx2xDZ5EmS+4i7O4FRDaya8XOpJ9LhT5ddYjUf4pT3mcRsro0VKQrvCe4pug+t6uMi3VxbIZDKZYtz4DYgdKmLD/YA5AAAAAElFTkSuQmCC"
                                alt="external-edit-interface-kiranshastry-solid-kiranshastry">
                        </a>
                        <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST"
                            onsubmit="return confirm('Apakah anda yakin ingin menghapus artikel ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-8">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAACXBIWXMAAAsTAAALEwEAmpwYAAABhElEQVR4nO2UzyvDcRzGlx8lsVZbU1JWWglHSpLkJGc1/AVqaddJcl+J+QOUEyH5C2Q5SaSWkpWWdsDJcuPwlnrF2/psbW+TZZ7j63me957vvmsez78qkJQpz58dUB+SH1btD6gpiYjv126ISI5vrb2AB0p0vnjvXW7kLAMylMMO5nfk/XgZxcKwG8uAE8qjil3ABh35IbxzxcZgKcuAXcrTiu3DIo78DN6eYhHYtmVAknJUsQQs7sjH8RKKLcDWLAOWKC8rFoMlHfkNvJhiK7BFy4Ao5VXFZmE7JV7Zx+sRkXXYvGXAHOVNxSZgR458Cm9csa1iv5lyBkxRPlBsAJZ25K/w+hU7hE1aBowUPq2IhGC3jnwWr1uxY9iwZUAf5VPFOmD3jvwDXlCxM1ivZUAP5UvFvLC8I/+M16ZYGhayDOiifK1YM+zFkX/Fa3L8dXdaBgQpZysuf96440bAUvYVe98V3HjkhtdSbqX89I0BeW60WMqNUj01WJ+gKjJ9+L/qRm80/hWTS4Xl4gAAAABJRU5ErkJggg=="
                                    alt="trash">
                            </button>
                        </form>
                    </div>
                </div>

                <div class="grid grid-cols-[1fr_4fr]">
                    <div class="relative">
                        <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail) }}"
                            alt="Artikel" class="h-full w-full object-cover aspect-[1/1]" />

                        <div
                            class="overlay-layer w-full absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-all duration-300 flex items-center justify-center">
                        </div>
                    </div>

                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $artikel->title }}</h2>

                        <p class="text-sm text-gray-500 mt-2">
                            Ditulis oleh <span class="font-semibold">{{ $artikel->user->nama }}</span>
                            pada <span
                                class="font-semibold">{{ $artikel->created_at->isoFormat('dddd, D MMMM Y') }}</span>
                        </p>

                        <p class="mt-4 text-gray-700 line-clamp-3">{{ $artikel->description }}</p>

                        <span
                            class="inline-block mt-4 px-3 py-1 text-xs font-bold rounded
                            {{ $artikel->status == 'publish' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ ucfirst($artikel->status) }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="py-4">
        {!! $artikels->links() !!}
    </div>
</x-admin>
