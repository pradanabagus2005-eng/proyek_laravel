<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-50 text-slate-800 antialiased">

    <!-- Lapisan gelap saat sidebar dibuka di layar kecil -->
    <div id="sidebar-overlay" class="fixed inset-0 z-30 hidden bg-slate-900/50 lg:hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col bg-slate-900 text-white transition-transform lg:translate-x-0">
        <div class="flex h-16 items-center gap-3 border-b border-slate-800 px-5">
            <span class="flex size-9 items-center justify-center rounded-md bg-teal-600">
                <x-icon name="mail" class="size-5 text-white" />
            </span>
            <span class="text-base font-semibold leading-tight tracking-tight">Sistem Informasi<br>Surat</span>
        </div>

        <nav class="flex-1 space-y-1 px-3 py-5">
            <a href="{{ route('dashboard') }}"
               class="nav-link {{ request()->routeIs('dashboard') ? 'nav-link-active' : '' }}">
                <x-icon name="home" class="size-5" />
                Dashboard
            </a>
            <a href="{{ route('surat-masuk.index') }}"
               class="nav-link {{ request()->routeIs('surat-masuk.*') ? 'nav-link-active' : '' }}">
                <x-icon name="inbox" class="size-5" />
                Surat Masuk
            </a>
            <a href="{{ route('surat-keluar.index') }}"
               class="nav-link {{ request()->routeIs('surat-keluar.*') ? 'nav-link-active' : '' }}">
                <x-icon name="outbox" class="size-5" />
                Surat Keluar
            </a>
        </nav>

        <!-- Info User & Logout -->
        @auth
        <div class="border-t border-slate-800 p-4">
            <div class="mb-3 flex items-center gap-3">
                <span class="flex size-9 shrink-0 items-center justify-center rounded-full bg-slate-700 text-sm font-semibold">
                    {{ strtoupper(mb_substr(auth()->user()->name, 0, 1)) }}
                </span>
                <div class="min-w-0">
                    <p class="truncate text-sm font-medium">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-400">Masuk sebagai {{ auth()->user()->role }}</p>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex w-full cursor-pointer items-center justify-center gap-2 rounded-md border border-slate-700 px-3 py-2 text-sm text-slate-300 transition-colors hover:bg-slate-800 hover:text-white">
                    <x-icon name="logout" class="size-4" />
                    Keluar
                </button>
            </form>
        </div>
        @endauth
    </aside>

    <!-- Konten -->
    <div class="flex min-h-screen flex-col lg:pl-64">
        <!-- Top bar (hanya di layar kecil) -->
        <header class="sticky top-0 z-20 flex h-14 items-center gap-3 border-b border-stone-200 bg-white px-4 lg:hidden">
            <button id="sidebar-toggle" type="button" class="cursor-pointer rounded-md p-1.5 text-slate-700 hover:bg-stone-100" aria-label="Buka menu">
                <x-icon name="menu" class="size-6" />
            </button>
            <span class="font-semibold text-slate-900">Sistem Informasi Surat</span>
        </header>

        <main class="w-full max-w-6xl flex-1 px-4 py-8 sm:px-8">
            @yield('content')
        </main>

        <footer class="px-4 pb-6 text-sm text-slate-400 sm:px-8">
            <p>Sistem Informasi Surat</p>
        </footer>
    </div>

    <script>
        (function () {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebar-overlay');
            var toggle = document.getElementById('sidebar-toggle');

            function setOpen(open) {
                sidebar.classList.toggle('-translate-x-full', !open);
                overlay.classList.toggle('hidden', !open);
            }

            toggle.addEventListener('click', function () {
                setOpen(sidebar.classList.contains('-translate-x-full'));
            });
            overlay.addEventListener('click', function () { setOpen(false); });
        })();
    </script>
</body>
</html>
