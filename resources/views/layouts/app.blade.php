
@php
$siteName = \App\Models\SiteSetting::getValue('site_name', 'Karang Taruna');
$siteLogo = \App\Models\SiteSetting::getValue('site_logo');
$siteDescription = \App\Models\SiteSetting::getValue('site_description', 'Website resmi Karang Taruna');

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

    <title>@yield('title', $siteName)</title>

    <meta name="description" content="{{ $siteDescription }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Instrument Sans', sans-serif;
        }

        [x-cloak] {
            display: none !important;
        }

        .glass-navbar {
            background: rgba(255, 255, 255, 0.28);
            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);
            border: 1px solid rgba(255, 255, 255, 0.45);
            box-shadow: 0 8px 35px rgba(15, 23, 42, 0.10);
        }
    </style>
</head>

<body class="bg-[#f8fafc] text-slate-900 antialiased">

    {{-- NAVBAR --}}
    <header
        x-data="{ menuOpen: false }"
        class="fixed top-5 left-0 z-50 w-full px-4">

        <nav class="glass-navbar mx-auto flex max-w-6xl items-center justify-between rounded-full px-5 py-3">

            {{-- LOGO DAN NAMA ORGANISASI --}}
            <a href="{{ url('/') }}" class="flex min-w-0 items-center gap-3">

                @if($siteLogoUrl)
                    <img
                        src="{{ $siteLogoUrl }}"
                        alt="{{ $siteName }}"
                        class="h-10 w-10 shrink-0 rounded-full object-contain">
                @else
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-900 font-bold text-white">
                        KT
                    </div>
                @endif

                <div class="min-w-0 leading-tight">
                    <p class="truncate font-bold text-slate-900">
                        {{ $siteName }}
                    </p>
                    <p class="text-xs text-slate-500">
                        Organisasi Kepemudaan
                    </p>
                </div>

            </a>

            {{-- MENU DESKTOP --}}
            <div class="hidden items-center gap-7 md:flex">
                <a href="{{ url('/') }}#beranda" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Beranda</a>
                <a href="{{ url('/') }}#profil" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Profil</a>
                <a href="{{ url('/') }}#divisi" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Divisi</a>
                <a href="{{ url('/') }}#anggota" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Anggota</a>
                <a href="{{ url('/') }}#berita" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Berita</a>
                <a href="{{ url('/') }}#kegiatan" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Kegiatan</a>
                <a href="{{ url('/') }}#galeri" class="text-sm font-medium text-slate-600 transition hover:text-slate-950">Galeri</a>
            </div>

            {{-- TOMBOL MOBILE --}}
            <button
                type="button"
                @click="menuOpen = !menuOpen"
                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-slate-100 text-slate-800 md:hidden"
                aria-label="Buka menu">

                {{-- IKON HAMBURGER --}}
                <svg
                    x-show="!menuOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    width="22"
                    height="22"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round">
                    <path d="M4 7h16M4 12h16M4 17h16" />
                </svg>

                {{-- IKON SILANG --}}
                <svg
                    x-show="menuOpen"
                    x-cloak
                    xmlns="http://www.w3.org/2000/svg"
                    width="22"
                    height="22"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round">
                    <path d="m18 6-12 12M6 6l12 12" />
                </svg>

            </button>

        </nav>

        {{-- MENU MOBILE --}}
        <div
            x-show="menuOpen"
            x-cloak
            x-transition
            @click.outside="menuOpen = false"
            class="glass-navbar mx-auto mt-3 max-w-6xl rounded-3xl p-5 md:hidden">

            <div class="flex flex-col gap-4">
                <a @click="menuOpen = false" href="{{ url('/') }}#beranda" class="text-sm font-medium">Beranda</a>
                <a @click="menuOpen = false" href="{{ url('/') }}#profil" class="text-sm font-medium">Profil</a>
                <a @click="menuOpen = false" href="{{ url('/') }}#divisi" class="text-sm font-medium">Divisi</a>
                <a @click="menuOpen = false" href="{{ url('/') }}#anggota" class="text-sm font-medium">Anggota</a>
                <a @click="menuOpen = false" href="{{ url('/') }}#berita" class="text-sm font-medium">Berita</a>
                <a @click="menuOpen = false" href="{{ url('/') }}#kegiatan" class="text-sm font-medium">Kegiatan</a>
                <a @click="menuOpen = false" href="{{ url('/') }}#galeri" class="text-sm font-medium">Galeri</a>
            </div>

        </div>

    </header>

    {{-- KONTEN HALAMAN --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-slate-200 bg-white px-6 py-8">
        <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-3 text-center sm:flex-row sm:text-left">

            <p class="text-sm font-semibold text-slate-800">
                {{ $siteName }}
            </p>

            <p class="text-xs text-slate-500">
                © {{ date('Y') }} {{ $siteName }}. Seluruh hak cipta dilindungi.
            </p>

        </div>
    </footer>

    @stack('script')

</body>

</html>
