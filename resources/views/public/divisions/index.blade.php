@extends('layouts.app')

@section('title', 'Divisi')

@section('content')

<section class="min-h-screen bg-[#f8fafc] px-6 py-24 sm:py-28">
    <div class="mx-auto max-w-6xl">

        {{-- HEADER --}}
        <div class="section-reveal mb-12">
            <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                BIDANG ORGANISASI
            </p>

            <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                Divisi organisasi.
            </h1>

            <p class="mt-5 max-w-2xl text-sm leading-7 text-slate-500 sm:text-base">
                Kenali setiap divisi dan orang-orang yang bergerak bersama
                untuk menjalankan kegiatan Karang Taruna.
            </p>
        </div>

        {{-- DAFTAR DIVISI --}}
        @if($divisions->isEmpty())

        <div class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-20 text-center">
            <h2 class="text-xl font-bold text-slate-800">
                Belum ada divisi
            </h2>
            <p class="mt-3 text-sm text-slate-500">
                Informasi divisi akan ditampilkan di halaman ini.
            </p>
        </div>

        @else

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">

            @foreach($divisions as $division)

            <article class="section-reveal group overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-slate-900/5">

                {{-- FOTO DIVISI --}}
                <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">

                    @if($division->foto)
                    <img
                        src="{{ asset('storage/' . $division->foto) }}"
                        alt="{{ $division->nama_divisi }}"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                    <div class="flex h-full items-center justify-center text-slate-300">
                        <span class="text-5xl">▧</span>
                    </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/30 to-transparent"></div>

                </div>

                {{-- INFORMASI DIVISI --}}
                <div class="p-7">

                    <p class="text-xs font-bold tracking-wider text-slate-400">
                        DIVISI {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </p>

                    <h2 class="mt-3 text-2xl font-bold text-slate-900">
                        {{ $division->nama_divisi }}
                    </h2>

                    <p class="mt-3 line-clamp-3 min-h-[4.5rem] text-sm leading-7 text-slate-500">
                        {{ $division->deskripsi ?: 'Informasi mengenai divisi ini akan segera tersedia.' }}
                    </p>

                    <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-5">

                        <span class="text-xs font-medium text-slate-400">
                            {{ $division->members_count }} Anggota
                        </span>

                        <a
                            href="{{ route('public.divisions.show', $division) }}"
                            class="inline-flex items-center gap-2 text-sm font-bold text-slate-900 transition group-hover:gap-3">
                            Lihat Divisi
                            <span>↗</span>
                        </a>

                    </div>

                </div>

            </article>

            @endforeach

        </div>

        @endif
    </div>
</section>

@endsection