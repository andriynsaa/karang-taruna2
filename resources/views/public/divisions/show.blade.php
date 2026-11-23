@extends('layouts.app')

@section('title', $division->nama_divisi . ' | Karang Taruna')

@section('content')

<section class="min-h-screen bg-[#f8fafc] px-6 pb-28 pt-36">
    <div class="mx-auto max-w-6xl">



        {{-- IDENTITAS DIVISI --}}
        <div class="mt-10 grid gap-10 md:grid-cols-2 md:items-center">

            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                    BIDANG ORGANISASI
                </p>

                <h1 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                    {{ $division->nama_divisi }}
                </h1>

                <p class="mt-6 text-base leading-8 text-slate-500">
                    {{ $division->deskripsi ?: 'Informasi mengenai divisi ini akan segera tersedia.' }}
                </p>

                <div class="mt-7 inline-flex items-center rounded-full border border-slate-200 bg-white px-5 py-3">
                    <span class="text-sm font-semibold text-slate-700">
                        {{ $division->members->count() }} Anggota
                    </span>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl bg-slate-100">
                @if ($division->foto)
                <img
                    src="{{ asset('storage/' . $division->foto) }}"
                    alt="{{ $division->nama_divisi }}"
                    class="aspect-[4/3] w-full object-cover">
                @else
                <div class="flex aspect-[4/3] items-center justify-center text-6xl text-slate-300">
                    ▧
                </div>
                @endif
            </div>

        </div>

        {{-- STRUKTUR DIVISI --}}
        <div class="mt-24">

            <div class="text-center">
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                    STRUKTUR DIVISI
                </p>

                <h2 class="mt-4 text-3xl font-bold tracking-tight text-slate-950 sm:text-4xl">
                    Orang-orang hebat di balik divisi.
                </h2>

                <p class="mx-auto mt-4 max-w-xl text-sm leading-7 text-slate-500">
                    Kenali ketua, wakil ketua, dan anggota yang berkontribusi
                    dalam menjalankan divisi ini.
                </p>
            </div>

            @php
            $ketua = $division->members->firstWhere('jabatan', 'ketua');
            $wakil = $division->members->firstWhere('jabatan', 'wakil');
            $anggota = $division->members->where('jabatan', 'anggota');
            @endphp

            {{-- KETUA DAN WAKIL --}}
            <div class="mx-auto mt-12 grid max-w-2xl gap-5 sm:grid-cols-2">

                @foreach ([
                ['data' => $ketua, 'label' => 'Ketua'],
                ['data' => $wakil, 'label' => 'Wakil Ketua']
                ] as $pengurus)

                <div class="overflow-hidden rounded-3xl border border-slate-200 bg-white p-6 text-center">

                    @if ($pengurus['data'])

                    @if ($pengurus['data']->foto)
                    <img
                        src="{{ asset('storage/' . $pengurus['data']->foto) }}"
                        alt="{{ $pengurus['data']->nama_lengkap }}"
                        class="mx-auto h-28 w-28 rounded-full object-cover">
                    @else
                    <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-slate-100 text-3xl font-bold text-slate-400">
                        {{ strtoupper(substr($pengurus['data']->nama_lengkap, 0, 1)) }}
                    </div>
                    @endif

                    <h3 class="mt-5 text-lg font-bold text-slate-900">
                        {{ $pengurus['data']->nama_lengkap }}
                    </h3>

                    @else

                    <div class="mx-auto flex h-28 w-28 items-center justify-center rounded-full bg-slate-100 text-3xl text-slate-300">
                        ?
                    </div>

                    <h3 class="mt-5 text-lg font-bold text-slate-400">
                        Belum ditentukan
                    </h3>

                    @endif

                    <p class="mt-2 text-sm font-semibold text-slate-500">
                        {{ $pengurus['label'] }}
                    </p>

                </div>

                @endforeach

            </div>

            {{-- DAFTAR ANGGOTA --}}
            <div class="mt-20">

                <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-end">
                    <div>
                        <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                            TIM DIVISI
                        </p>

                        <h3 class="mt-3 text-2xl font-bold text-slate-950">
                            Anggota Divisi
                        </h3>
                    </div>

                    <p class="text-sm text-slate-500">
                        {{ $anggota->count() }} orang
                    </p>
                </div>

                @if ($anggota->isNotEmpty())

                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

                    @foreach ($anggota as $member)

                    <div class="rounded-3xl border border-slate-200 bg-white p-6 text-center transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-900/5">

                        @if ($member->foto)
                        <img
                            src="{{ asset('storage/' . $member->foto) }}"
                            alt="{{ $member->nama_lengkap }}"
                            class="mx-auto h-24 w-24 rounded-full object-cover">
                        @else
                        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full bg-slate-100 text-2xl font-bold text-slate-400">
                            {{ strtoupper(substr($member->nama_lengkap, 0, 1)) }}
                        </div>
                        @endif

                        <h4 class="mt-5 font-bold text-slate-900">
                            {{ $member->nama_lengkap }}
                        </h4>

                        <p class="mt-2 text-xs font-medium text-slate-400">
                            Anggota
                        </p>

                    </div>

                    @endforeach

                </div>

                @else

                <div class="mt-8 rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                    <h4 class="font-bold text-slate-800">
                        Belum ada anggota
                    </h4>

                    <p class="mt-2 text-sm text-slate-500">
                        Anggota divisi akan ditampilkan di sini.
                    </p>
                </div>
                {{-- KEMBALI --}}
                <a href="{{ route('public.divisions.index') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-slate-500 transition hover:text-slate-950">
                    ← Kembali ke semua divisi
                </a>

                @endif

            </div>

        </div>

    </div>
</section>

@endsection