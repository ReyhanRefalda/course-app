<x-user>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900">
                            @isset(Auth::user()->avatar)
                                <img class="mr-4 w-10 h-10 rounded-full"
                                    src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="Jese Leos">
                            @endisset
                            <div>
                                <a href="#" rel="author"
                                    class="text-lg font-bold text-gray-900">{{ $artikels->user->nama }}</a>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    {{ $artikels->created_at->isoFormat('dddd, D MMMM Y') }}</p>
                            </div>
                        </div>
                    </address>
                    <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl">
                        {{ $artikels->title }}</h1>
                </header>

                @isset($artikels->description)
                    <div>
                        <p class="m-0 mt-2"><strong>RINGKASAN:</strong></p>
                        <p class="lead m-0 pl-4 text-gray-800">{{ $artikels->description }}</p>
                    </div>
                @endisset

                <div class="flex justify-center">
                    <figure><img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikels->tumbnail) }}"
                            alt="{{ $artikels->title }}" class="flex justify-center rounded-lg max-h-[400px]">
                    </figure>
                </div>
                <p class="text-gray-900">{!! $artikels->content !!}</p>


                <section class="not-format">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-lg lg:text-2xl font-bold text-gray-900">Komentar</h2>
                    </div>
                    <form class="mb-6">
                        <div class="py-2 px-4 mb-4 rounded-lg rounded-t-lg border border-blue-500 bg-gray-100">
                            <label for="comment" class="sr-only">Komentar Anda</label>
                            <textarea id="comment" rows="6"
                                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 dark:placeholder-gray-800 bg-gray-100"
                                placeholder="Tulis Komentar anda..." required></textarea>
                        </div>
                        <button type="submit"
                            class="dark:bg-blue-500 inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                            Kirim
                        </button>
                    </form>

                    <article class="p-6 mb-6 text-base bg-white rounded-lg">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p class="inline-flex items-center mr-3 font-semibold text-sm text-gray-800">
                                    <img class="mr-2 w-6 h-6 rounded-full"
                                        src="https://flowbite.com/docs/images/people/profile-picture-2.jpg"
                                        alt="Michael Gough">Michael Gough
                                </p>
                                <p class="text-sm text-gray-600"><time pubdate datetime="2022-02-08"
                                        title="February 8th, 2022">Feb. 8, 2022</time></p>
                            </div>

                            <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1"
                                class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-700 bg-white rounded-lg hover:bg-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-500"
                                type="button">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment1"
                                class="hidden z-10 w-36 bg-gray-200 rounded divide-y divide-gray-200 shadow">
                                <ul class="py-1 text-sm text-gray-700 "
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100">Edit</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100">Remove</a>
                                    </li>
                                </ul>
                            </div>
                        </footer>
                        <p class="border-b-2 border-gray-300 pb-2">Comment Example</p>
                </section>

            </article>

            {{-- <aside>
                <div class="space-y-6">
                    @foreach ($sidebarArtikel as $artikel)
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset(getenv('CUSTOM_TUMBNAIL_LOCATION') . '/' . $artikel->tumbnail) }}"
                                class="w-20 h-20 object-cover rounded-lg" alt="Concert">
                            <div>
                                <p class="text-gray-800 font-semibold">{{ $artikel->title }}</p>
                                <p class="text-xs text-gray-500 mt-2">By {{ $artikel->user->nama }} |
                                    {{ $artikel->created_at->isoFormat('dddd, D MMMM Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </aside> --}}
        </div>
    </main>
</x-user>
