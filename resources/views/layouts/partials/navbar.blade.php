<nav class=" w-full flex items-center justify-between" aria-label="Global">
    <ul class="icon-nav flex items-center gap-4">
        <li class="relative xl:hidden">
            <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                aria-label="Toggle navigation" href="javascript:void(0)">
                <i class="ti ti-menu-2 relative z-1"></i>
            </a>
        </li>

        <li class="relative">

            <div class="hs-dropdown relative inline-flex [--placement:bottom-left] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle inline-flex  icon-hover text-gray-600" href="#">
                    <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                    <div
                        class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-blue-600 w-2 h-2 rounded-full -top-[1px] -right-[6px]">
                    </div>
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[300px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div>
                        <h3 class="text-gray-600 font-semibold text-base px-6 py-3">
                            Notification</h3>
                        <ul class="list-none  flex flex-col">
                            <li>
                                <a href="#" class="py-3 px-6 block hover:bg-blue-500">
                                    <p class="text-sm text-gray-600 font-semibold">Roman Joined
                                        the Team!</p>
                                    <p class="text-xs text-gray-500 font-medium">Congratulate
                                        him</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </li>
    </ul>
    <div class="flex items-center gap-4">
        @auth
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="flex items-center gap-2 relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/avatar/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->avatar }}"
                            class="aspect-square w-10 h-full rounded-full object-cover" />
                    @else
                        <img src="{{ asset('aset/default-profile.png') }}" alt="{{ Auth::user()->name }}"
                            class="aspect-square w-10 h-full rounded-full object-cover" />
                    @endif
                    <div class="flex items-center text-gray-800">
                        <div>{{ Auth::user()->nama }}</div>

                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </div>
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] border border-gray-400 rounded-[7px] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <a href="{{ route('profile.edit') }}"
                            class="flex gap-2 items-center px-4 py-[6px] hover:bg-blue-500">
                            <i class="ti ti-user text-gray-500 text-xl "></i>
                            <p class="text-sm text-gray-500">My Profile</p>
                        </a>
                        <div class="px-4 mt-[7px] grid">
                            <form method="POST" action="{{ route('logout') }}"
                                class="btn-outline-primary w-full hover:bg-blue-600 hover:text-white">
                                @csrf
                                <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endauth
    </div>
</nav>
