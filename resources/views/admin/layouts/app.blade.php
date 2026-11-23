
@php
    $siteName = \App\Models\SiteSetting::getValue('site_name', 'Karang Taruna');
    $siteLogo = \App\Models\SiteSetting::getValue('site_logo');

    $siteLogoUrl = $siteLogo
        ? (str_starts_with($siteLogo, 'site-settings/')
            ? asset('storage/' . $siteLogo)
            : asset($siteLogo))
        : null;
@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Panel') | {{ $siteName }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        /* SIDEBAR MOBILE */
        #admin-sidebar-toggle {
            position: absolute;
            width: 1px;
            height: 1px;
            opacity: 0;
            pointer-events: none;
        }

        .admin-sidebar {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        #admin-sidebar-toggle:checked ~ .admin-sidebar {
            transform: translateX(0);
        }

        .admin-sidebar-overlay {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }

        #admin-sidebar-toggle:checked ~ .admin-sidebar-overlay {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
        }

        @media (min-width: 1024px) {
            .admin-sidebar {
                transform: translateX(0);
            }

            .admin-sidebar-overlay {
                display: none !important;
            }
        }
    </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <div x-data="{ collapsed: false }">

        {{-- KONTROL SIDEBAR MOBILE --}}
        <input
            type="checkbox"
            id="admin-sidebar-toggle"
            aria-label="Buka atau tutup menu">

        {{-- LAPISAN GELAP MOBILE --}}
        <label
            for="admin-sidebar-toggle"
            class="admin-sidebar-overlay fixed inset-0 z-40 bg-slate-950/50 lg:hidden">
        </label>

        {{-- SIDEBAR --}}
        <aside
            class="admin-sidebar fixed inset-y-0 left-0 z-50 flex w-[min(18rem,85vw)] flex-col border-r border-slate-200 bg-white shadow-xl lg:shadow-none"
            :class="collapsed ? 'lg:w-20' : 'lg:w-72'">

            {{-- IDENTITAS ORGANISASI --}}
            <div class="flex h-20 shrink-0 items-center justify-between border-b border-slate-100 px-5">

                <div class="flex min-w-0 items-center gap-3">

                    @if($siteLogoUrl)
                        <img
                            src="{{ $siteLogoUrl }}"
                            alt="{{ $siteName }}"
                            class="h-10 w-10 shrink-0 rounded-xl border border-slate-100 object-contain">
                    @else
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-slate-900 font-bold text-white">
                            KT
                        </div>
                    @endif

                    <div x-show="!collapsed" class="min-w-0">
                        <p class="truncate text-sm font-bold">
                            {{ $siteName }}
                        </p>
                        <p class="text-xs text-slate-400">Admin Panel</p>
                    </div>

                </div>

                {{-- TOMBOL TUTUP MOBILE --}}
                <label
                    for="admin-sidebar-toggle"
                    class="cursor-pointer rounded-lg px-3 py-2 text-xl text-slate-500 hover:bg-slate-100 lg:hidden">
                    ✕
                </label>

            </div>

            {{-- MENU --}}
            <nav class="min-h-0 flex-1 space-y-2 overflow-y-auto overflow-x-hidden p-3">

                <p
                    x-show="!collapsed"
                    class="px-3 pb-2 pt-3 text-xs font-bold uppercase tracking-wider text-slate-400">
                    Menu Utama
                </p>

                <a
                    href="{{ route('admin.dashboard') }}"
                    title="Dashboard"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.dashboard') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">

                    <span class="shrink-0 text-lg">▦</span>
                    <span x-show="!collapsed">Dashboard</span>
                </a>

                <a
                    href="{{ route('admin.content.index') }}"
                    title="Pengaturan Website"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.content.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">

                    <span class="shrink-0 text-lg">⚙</span>
                    <span x-show="!collapsed">Pengaturan Website</span>
                </a>

                <a
                    href="{{ route('admin.divisions.index') }}"
                    title="Kelola Divisi"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.divisions.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">

                    <span class="shrink-0 text-lg">▤</span>
                    <span x-show="!collapsed">Kelola Divisi</span>
                </a>

                <a
                    href="{{ route('admin.members.index') }}"
                    title="Kelola Anggota"
                    class="flex items-center gap-3 rounded-xl px-3 py-3 text-sm font-medium transition
                    {{ request()->routeIs('admin.members.*') ? 'bg-slate-900 text-white' : 'text-slate-600 hover:bg-slate-100' }}">

                    <span class="shrink-0 text-lg">♙</span>
                    <span x-show="!collapsed">Kelola Anggota</span>
                </a>

            </nav>

            {{-- AKUN DAN LOGOUT --}}
            <div class="shrink-0 border-t border-slate-100 p-3">

                <div
                    x-show="!collapsed"
                    class="mb-3 rounded-xl bg-slate-50 p-3">

                    <p class="truncate text-sm font-semibold">
                        {{ auth()->user()?->name ?? 'Administrator' }}
                    </p>

                    <p class="text-xs text-slate-400">Administrator</p>
                </div>

                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf

                    <button
                        type="submit"
                        title="Keluar"
                        class="flex w-full items-center gap-3 rounded-xl px-3 py-3 text-sm font-semibold text-red-600 transition hover:bg-red-50">

                        <span class="shrink-0 text-lg">↪</span>
                        <span x-show="!collapsed">Keluar</span>

                    </button>
                </form>

            </div>

        </aside>

        {{-- KONTEN UTAMA --}}
        <div
            class="min-h-screen min-w-0 w-full overflow-x-hidden transition-all duration-300"
            :class="collapsed ? 'lg:ml-20 lg:w-[calc(100%-5rem)]' : 'lg:ml-72 lg:w-[calc(100%-18rem)]'">

            {{-- HEADER --}}
            <header class="sticky top-0 z-30 flex h-16 min-w-0 items-center justify-between gap-2 border-b border-slate-200 bg-white px-3 sm:px-6">

                <div class="flex min-w-0 items-center gap-2 sm:gap-3">

                    {{-- HAMBURGER MOBILE --}}
                    <label
                        for="admin-sidebar-toggle"
                        class="cursor-pointer rounded-lg p-2 text-lg hover:bg-slate-100 lg:hidden">
                        ☰
                    </label>

                    {{-- CIUTKAN SIDEBAR DESKTOP --}}
                    <button
                        type="button"
                        @click="collapsed = !collapsed"
                        class="hidden rounded-lg p-2 hover:bg-slate-100 lg:block"
                        title="Buka atau ciutkan sidebar">
                        ☰
                    </button>

                    <h1 class="truncate text-sm font-bold">
                        @yield('title', 'Dashboard')
                    </h1>

                </div>

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    class="shrink-0 rounded-lg px-2 py-2 text-xs font-semibold text-slate-600 hover:bg-slate-100 sm:px-3">
                    Lihat Website ↗
                </a>

            </header>

            {{-- ISI HALAMAN --}}
            <main class="min-w-0 w-full">
                @yield('content')
            </main>

        </div>

    </div>

</body>
</html>
