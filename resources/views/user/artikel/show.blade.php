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
                    <livewire:komentar-section :artikel-id="$artikels->id" />
                </section>

            </article>

        </div>
    </main>
</x-user>
