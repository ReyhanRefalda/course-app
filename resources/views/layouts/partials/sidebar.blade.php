<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[1] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white  left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-5">
        <a href="../" class="text-nowrap">
            <img src="{{ asset('aset/LOGO-WITH-SIDENAME-ANIMATED.GIF') }}" alt="Logo-Dark" />
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

                    <!-- Dashboard -->
                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                            href="{{ route('dashboard') }}">
                            <i class="ti ti-layout-dashboard  text-xl"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Daftar User, hanya bisa diakses oleh yang memiliki izin 'manage user' -->
                    @can('manage user')

                    @endcan

                    <!-- Daftar Artikel, hanya bisa diakses oleh yang memiliki izin 'manage artikel' -->
                    @can('manage artikel')
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                                href="{{ route('admin.artikel.index') }}">
                                <i class="ti ti-news  text-xl"></i> <span>Daftar Artikel</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Daftar Kursus, hanya bisa diakses oleh yang memiliki izin 'manage kursus' -->
                    @can('manage kursus')
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                                href="{{ route('admin.kursus.index') }}">
                                <i class="ti ti-school text-xl"></i>
                                <span>Daftar Kursus</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Daftar Modul, hanya bisa diakses oleh yang memiliki izin 'manage modul' -->
                    @can('manage modul')
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                                href="{{ route('admin.modul.index') }}">
                                <i class="ti ti-folder text-xl"></i>
                                <span>Daftar Modul</span>
                            </a>
                        </li>
                    @endcan

                    <!-- Daftar Pelajaran, hanya bisa diakses oleh yang memiliki izin 'manage pelajaran' -->
                    @can('manage pelajaran')
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-100 hover:bg-blue-500"
                                href="{{ route('admin.pelajaran.index') }}">
                                <i class="ti ti-notebook text-xl"></i>
                                <span>Daftar Pelajaran</span>
                            </a>
                        </li>
                    @endcan

                </ul>
            </nav>
        </div>
    </div>
    <!-- </aside> -->
</aside>
