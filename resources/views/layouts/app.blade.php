<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        @fonts
        <script>
            (() => {
                const savedTheme = localStorage.getItem('theme');
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;

                document.documentElement.classList.toggle('dark', savedTheme === 'dark' || (savedTheme === null && prefersDark));
            })();
        </script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen bg-[#f7f5f0] text-[#1b1b18] dark:bg-[#10100f] dark:text-[#EDEDEC]">
        <nav class="sticky top-0 z-10 border-b border-[#dedbd2]/80 bg-[#f7f5f0]/90 backdrop-blur dark:border-[#3E3E3A]/80 dark:bg-[#10100f]/90" aria-label="Main navigation">
            <div class="mx-auto flex w-full max-w-6xl flex-wrap items-center justify-between gap-4 px-6 py-4 lg:px-8">
                <a href="{{ url('/') }}" class="flex items-center gap-3 font-semibold tracking-tight">
                    <span class="flex size-8 items-center justify-center bg-[#f53003] text-sm font-bold text-white">L</span>
                    <span>{{ config('app.name', 'Laravel') }}</span>
                </a>

                <div class="flex items-center gap-1 text-sm">
                    <a href="{{ url('/') }}" class="px-3 py-2 transition-colors {{ request()->is('/') ? 'font-semibold text-[#f53003] dark:text-[#FF4433]' : 'text-[#706f6c] hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]' }}">Home</a>
                    <a href="{{ route('products.index') }}" class="px-3 py-2 transition-colors {{ request()->routeIs('products.*') ? 'font-semibold text-[#f53003] dark:text-[#FF4433]' : 'text-[#706f6c] hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]' }}">Products</a>
                    <a href="{{ route('about') }}" class="px-3 py-2 transition-colors {{ request()->routeIs('about') ? 'font-semibold text-[#f53003] dark:text-[#FF4433]' : 'text-[#706f6c] hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]' }}">About</a>

                    <button type="button" data-theme-toggle aria-pressed="false" aria-label="Switch to dark theme" class="ml-1 inline-flex size-9 items-center justify-center border border-[#dedbd2] text-[#706f6c] transition hover:border-[#f53003] hover:text-[#f53003] dark:border-[#3E3E3A] dark:text-[#A1A09A] dark:hover:border-[#FF4433] dark:hover:text-[#FF4433]" title="Switch to dark theme">
                        <svg class="size-4 dark:hidden" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <circle cx="12" cy="12" r="4"></circle>
                            <path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M4.93 19.07l1.41-1.41M17.66 6.34l1.41-1.41"></path>
                        </svg>
                        <svg class="hidden size-4 dark:block" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"></path>
                        </svg>
                    </button>

                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-3 py-2 text-[#706f6c] transition-colors hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-3 py-2 text-[#706f6c] transition-colors hover:text-[#f53003] dark:text-[#A1A09A] dark:hover:text-[#FF4433]">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-[#1b1b18] px-4 py-2 font-medium text-white transition hover:bg-[#f53003] dark:bg-[#EDEDEC] dark:text-[#1b1b18] dark:hover:bg-[#FF4433]">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </nav>

        <main>
            @if (session('status'))
                <div class="mx-auto mt-6 w-full max-w-6xl px-6 lg:px-8">
                    <div class="border-l-4 border-emerald-500 bg-white px-4 py-3 text-sm text-emerald-800 shadow-sm dark:bg-[#161615] dark:text-emerald-200" role="status">
                        {{ session('status') }}
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </body>
</html>
