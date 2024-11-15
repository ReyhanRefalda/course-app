<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/theme.css') }}" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            /* border: 1px solid red; */
        }
    </style>
</head>

<body class="font-sans antialiased sb-nav-fixed">
    <main>
        <div id="main-wrapper" class=" flex">
            @include('layouts.partials.sidebar')
            <div class="w-full page-wrapper overflow-hidden">
                <!--  Header Start -->
                <header class="container full-container w-full text-sm   py-4">
                    <div class=" w-full">
                        @include('layouts.partials.navbar')
                    </div>
                </header>
                <!--  Header End -->

                <!-- Main Content -->
                <main class="h-full overflow-y-auto  max-w-full  pt-4">
                    <div class="container full-container py-5 flex flex-col gap-6">
                        {{ $slot }}
                    </div>
                </main>
                <!-- Main Content End -->

            </div>
        </div>
    </main>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>
    <script src="../assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
    <script src="../assets/libs/@preline/dropdown/index.js"></script>
    <script src="../assets/libs/@preline/overlay/index.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
</body>

</html>
