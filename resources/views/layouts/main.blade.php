<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title }}</title>
        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <!-- Alpine -->
        <script src="//unpkg.com/alpinejs" defer></script>
        <!-- Fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            [x-cloak] {
                display: none !important;
            }
        </style>
    </head>

    <body class="bg-gray-100">
        <div x-data="{
            open: localStorage.getItem('sidebarOpen') ? JSON.parse(localStorage.getItem('sidebarOpen')) : window.innerWidth >= 768
        }" x-init="window.addEventListener('resize', () => {
            open = window.innerWidth >= 768;
            localStorage.setItem('sidebarOpen', JSON.stringify(open));
        });
        $watch('open', value => localStorage.setItem('sidebarOpen', JSON.stringify(value)));" class="flex h-screen">
            <!-- Sidebar -->
            @include('layouts.partials.sidebar')

            <!-- Main Content -->
            <div class="flex-1 flex flex-col h-screen">
                <!-- Navbar Sticky -->
                <!-- Navbar -->
                @include('layouts.partials.navbar')

                <!-- Content + Footer Wrapper -->
                <div class="flex-1 flex flex-col overflow-auto">
                    <div class="px-6 py-5 flex-1">
                        <!-- Content -->
                        @yield('content')
                    </div>

                    <!-- Footer -->
                    <footer class="bg-white shadow px-4 py-3 text-xs text-center">
                        <p class="text-gray-600">&copy; {{ \Carbon\Carbon::now()->format('Y') }} - Copyright</p>
                    </footer>
                </div>
            </div>
        </div>
    </body>

</html>
