
@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">

    <div class="mb-8">
        <p class="text-sm text-slate-500">
            Selamat datang,
        </p>

        <h2 class="mt-1 text-3xl font-bold text-slate-900">
            {{ auth()->user()->name }}
        </h2>

        <p class="mt-2 text-sm text-slate-500">
            Kelola konten website Karang Taruna melalui halaman ini.
        </p>
    </div>

    <div class="mb-6">
        <h3 class="text-lg font-bold text-slate-900">
            Pengelolaan Website
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Pilih bagian website yang ingin dikelola.
        </p>
    </div>

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">

        <a
            href="{{ route('admin.content.index') }}"
            class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition duration-200 hover:-translate-y-1 hover:border-slate-400 hover:shadow-md"
        >

            <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-xl bg-slate-100 text-slate-700">

                <svg xmlns="http://www.w3.org/2000/svg"
                     width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor"
                     stroke-width="1.8" stroke-linecap="round"
                     stroke-linejoin="round">
                    <circle cx="12" cy="12" r="3"/>
                    <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.7 2.9h-.1a1.7 1.7 0 0 0-1.7.5l-.1.1h-3.4l-.1-.1a1.7 1.7 0 0 0-1.7-.5h-.1l-1.7-2.9.1-.1a1.7 1.7 0 0 0 .3-1.9v-3.4a1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.7-2.9h.1a1.7 1.7 0 0 0 1.7-.5l.1-.1h3.4l.1.1a1.7 1.7 0 0 0 1.7.5h.1l1.7 2.9-.1.1a1.7 1.7 0 0 0-.3 1.9z"
                          transform="translate(-1 -1)"/>
                </svg>

            </div>

            <h4 class="text-base font-bold text-slate-900">
                Pengaturan Website
            </h4>

            <p class="mt-2 text-sm leading-relaxed text-slate-500">
                Ubah nama organisasi, logo, foto, dan tulisan pada halaman beranda.
            </p>

            <div class="mt-5 flex items-center gap-2 text-sm font-semibold text-slate-700 transition-all group-hover:gap-3">
                Kelola Pengaturan
                <span>→</span>
            </div>

        </a>

    </div>

</div>

@endsection
