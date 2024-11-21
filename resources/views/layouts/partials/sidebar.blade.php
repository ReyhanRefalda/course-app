<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[1] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white  left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-5">
        <a href="../" class="text-nowrap">
            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" alt="Logo-Dark" />
        </a>
    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-gray-600 text-sm [&>li]:mb-2">
                    <li class="text-xs font-bold pb-4">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>MASTER</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('dashboard') }}">
                            <i class="ti ti-layout-dashboard  text-xl"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('admin.users.index') }}">
                            <i class="ti ti-user  text-xl"></i> <span>Daftar User</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('admin.artikel.index') }}">
                            <i class="ti ti-news  text-xl"></i> <span>Daftar Artikel</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('admin.kursus.index') }}">
                            <i class="ti ti-school text-xl"></i>
                            <span>Daftar Kursus</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('admin.modul.index') }}">
                            <i class="ti ti-folder text-xl"></i>
                            <span>Daftar Modul</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('admin.pelajaran.index') }}">
                            <i class="ti ti-notebook text-xl"></i>
                            <span>Daftar Pelajaran</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- </aside> -->
</aside>
