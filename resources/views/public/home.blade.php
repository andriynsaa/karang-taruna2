@php
// AMBIL PENGATURAN CMS
$hero = \App\Models\SiteSetting::getGroup('hero');
$profile = \App\Models\SiteSetting::getGroup('profil');
$divisionSettings = \App\Models\SiteSetting::getGroup('divisi');
$member = \App\Models\SiteSetting::getGroup('anggota');
$news = \App\Models\SiteSetting::getGroup('berita');
$activity = \App\Models\SiteSetting::getGroup('kegiatan');
$gallery = \App\Models\SiteSetting::getGroup('galeri');
$structure = \App\Models\SiteSetting::getGroup('struktur');

// FOTO HERO
$heroImage = $hero['hero_image'] ?? 'images/hero-karang-taruna.jpg';

$heroImageUrl = $heroImage
? (str_starts_with($heroImage, 'site-settings/')
? asset('storage/' . $heroImage)
: asset($heroImage))
: asset('images/hero-karang-taruna.jpg');

// DATA DIVISI DARI DATABASE
$divisions = \App\Models\Division::withCount('members')
->orderBy('urutan')
->orderBy('id')
->take(3)
->get();
@endphp

@extends('layouts.app')

@section('title', 'Beranda | ' . \App\Models\SiteSetting::getValue('site_name', 'Karang Taruna'))

@section('content')

{{-- HERO FOTO FULL WIDTH --}}
<section id="beranda" class="w-full">

    {{-- FOTO UTAMA --}}
    <div class="relative h-[65vh] min-h-[430px] max-h-[760px] w-full overflow-hidden sm:h-[78vh]">
        <img
            src="{{ $heroImageUrl }}"
            alt="Kebersamaan anggota Karang Taruna"
            class="h-full w-full object-cover object-center">

        <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-transparent to-black/30"></div>
    </div>

    {{-- KONTEN HERO --}}
    <div class="relative overflow-hidden bg-[#f8fafc] px-6 py-20 sm:py-28">

        <div class="pointer-events-none absolute -right-40 top-10 h-96 w-96 rounded-full bg-blue-100/60 blur-[100px]"></div>

        <div class="relative mx-auto grid w-full max-w-6xl items-center gap-14 lg:grid-cols-2">

            {{-- BAGIAN KIRI --}}
            <div class="hero-content">

                <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-xs font-semibold text-slate-600 shadow-sm backdrop-blur">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    {{ $hero['hero_badge'] ?? 'ORGANISASI KEPEMUDAAN' }}
                </div>

                <h1 class="max-w-2xl text-5xl font-bold leading-[1.12] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    {{ $hero['hero_title'] ?? 'Berkolaborasi Bersama, Berkarya untuk Sesama.' }}
                </h1>

                <p class="mt-7 max-w-lg text-base leading-8 text-slate-500 sm:text-lg">
                    {{ $hero['hero_description'] ?? 'Ruang bagi generasi muda untuk tumbuh, berkolaborasi, dan memberikan kontribusi positif bagi lingkungan masyarakat.' }}
                </p>

                <div class="mt-14 flex items-center gap-8 border-t border-slate-200 pt-7">
                    <div>
                        <p class="text-2xl font-bold text-slate-950">
                            {{ $hero['hero_stat_1_number'] ?? '01' }}
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            {{ $hero['hero_stat_1_label'] ?? 'Kebersamaan' }}
                        </p>
                    </div>

                    <div class="h-10 w-px bg-slate-200"></div>

                    <div>
                        <p class="text-2xl font-bold text-slate-950">
                            {{ $hero['hero_stat_2_number'] ?? '02' }}
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            {{ $hero['hero_stat_2_label'] ?? 'Kreativitas' }}
                        </p>
                    </div>

                    <div class="h-10 w-px bg-slate-200"></div>

                    <div>
                        <p class="text-2xl font-bold text-slate-950">
                            {{ $hero['hero_stat_3_number'] ?? '03' }}
                        </p>
                        <p class="mt-1 text-xs text-slate-500">
                            {{ $hero['hero_stat_3_label'] ?? 'Kontribusi' }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- BAGIAN KANAN --}}
            <div class="hero-visual relative mx-auto w-full max-w-lg">

                <div class="relative aspect-[4/5] overflow-hidden rounded-[2.5rem] bg-slate-900 p-7 shadow-2xl shadow-slate-900/15 sm:p-10">

                    <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full border border-white/10"></div>
                    <div class="absolute -right-10 -top-10 h-52 w-52 rounded-full border border-white/10"></div>
                    <div class="absolute -bottom-28 -left-20 h-80 w-80 rounded-full bg-indigo-500/30 blur-3xl"></div>

                    <div class="relative flex h-full flex-col justify-between">

                        <div class="flex items-center justify-between">
                            <span class="text-xs font-semibold tracking-[0.25em] text-white/50">
                                {{ $hero['hero_card_label'] ?? 'KARANG TARUNA' }}
                            </span>
                        </div>

                        <div>
                            <div class="mb-5 flex h-16 w-16 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-3xl text-white backdrop-blur">
                                ✳
                            </div>

                            <h2 class="max-w-sm text-4xl font-bold leading-tight tracking-tight text-white sm:text-5xl">
                                {{ $hero['hero_card_title'] ?? 'Satu Gerakan, Banyak Perubahan.' }}
                            </h2>

                            <p class="mt-5 max-w-xs text-sm leading-7 text-white/50">
                                {{ $hero['hero_card_description'] ?? 'Bersama menciptakan lingkungan yang aktif, kreatif, dan penuh kepedulian.' }}
                            </p>
                        </div>

                        <div class="flex items-end justify-between border-t border-white/15 pt-5">
                            <div>
                                <p class="text-xs text-white/40">
                                    {{ $hero['hero_card_footer_label'] ?? 'TUMBUH BERSAMA' }}
                                </p>
                                <p class="mt-1 text-sm font-semibold text-white">
                                    {{ $hero['hero_card_footer_text'] ?? 'Untuk masa depan' }}
                                </p>
                            </div>

                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-xl text-slate-950">
                                ↗
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- PROFIL --}}
<section id="profil" class="scroll-mt-28 bg-white px-6 py-28">
    <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-2 lg:items-center">

        <div class="section-reveal">
            <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                {{ $profile['profile_label'] ?? 'TENTANG KAMI' }}
            </p>

            <h2 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-slate-950 sm:text-5xl">
                {{ $profile['profile_title'] ?? 'Anak muda punya peran dalam perubahan.' }}
            </h2>
        </div>

        <div class="section-reveal">
            <p class="text-base leading-8 text-slate-500">
                {{ $profile['profile_description'] ?? 'Karang Taruna merupakan wadah bagi generasi muda untuk mengembangkan potensi, membangun kepedulian sosial, serta berpartisipasi dalam kegiatan positif di lingkungan masyarakat.' }}
            </p>
        </div>

    </div>
</section>

{{-- DIVISI --}}
<section id="divisi" class="scroll-mt-28 bg-[#f8fafc] px-6 py-28">
    <div class="mx-auto max-w-6xl">

        <div class="section-reveal flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                    {{ $divisionSettings['division_label'] ?? 'BIDANG ORGANISASI' }}
                </p>

                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                    {{ $divisionSettings['division_title'] ?? 'Bergerak dalam divisi.' }}
                </h2>
            </div>

            <a href="{{ url('/divisi') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-950">
                Lihat semua divisi ↗
            </a>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-3">

            @forelse ($divisions as $division)

            <a
                href="{{ route('public.divisions.show', $division) }}"
                class="section-reveal group overflow-hidden rounded-3xl border border-slate-200 bg-white transition duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-slate-900/5">

                <div class="relative aspect-[4/3] overflow-hidden bg-slate-100">

                    @if ($division->foto)
                    <img
                        src="{{ asset('storage/' . $division->foto) }}"
                        alt="{{ $division->nama_divisi }}"
                        class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    @else
                    <div class="flex h-full items-center justify-center text-5xl text-slate-300">
                        ▧
                    </div>
                    @endif

                </div>

                <div class="p-7">
                    <p class="text-sm font-bold text-slate-300">
                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                    </p>

                    <h3 class="mt-8 text-2xl font-bold text-slate-900">
                        {{ $division->nama_divisi }}
                    </h3>

                    <p class="mt-4 line-clamp-3 min-h-[4.5rem] text-sm leading-7 text-slate-500">
                        {{ $division->deskripsi ?: 'Informasi mengenai divisi ini akan segera tersedia.' }}
                    </p>

                    <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-5">
                        <span class="text-xs text-slate-400">
                            {{ $division->members_count }} Anggota
                        </span>

                        <span class="text-sm font-semibold text-slate-900 transition group-hover:translate-x-1">
                            Lihat Divisi ↗
                        </span>
                    </div>
                </div>

            </a>

            @empty

            <div class="col-span-full rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
                <h3 class="text-lg font-bold text-slate-900">
                    Belum ada divisi
                </h3>
                <p class="mt-2 text-sm text-slate-500">
                    Divisi organisasi akan ditampilkan di sini.
                </p>
            </div>

            @endforelse

        </div>
    </div>
</section>

{{-- ANGGOTA --}}
<section id="anggota" class="scroll-mt-28 bg-white px-6 py-28">
    <div class="section-reveal mx-auto max-w-6xl rounded-[2rem] bg-slate-950 px-8 py-14 text-white sm:px-14">
        <div class="grid gap-10 md:grid-cols-2 md:items-center">

            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-white/40">
                    {{ $member['member_label'] ?? 'SUMBER KEKUATAN KAMI' }}
                </p>

                <h2 class="mt-5 text-4xl font-bold leading-tight sm:text-5xl">
                    {{ $member['member_title'] ?? 'Setiap anggota punya cerita dan kontribusi.' }}
                </h2>
            </div>

            <div>
                <p class="leading-8 text-white/55">
                    {{ $member['member_description'] ?? 'Kenali orang-orang yang menjadi bagian dari perjalanan dan kegiatan Karang Taruna.' }}
                </p>

                <a href="{{ url('/anggota') }}"
                    class="mt-7 inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:-translate-y-1">
                    {{ $member['member_button'] ?? 'Kenali Anggota' }} ↗
                </a>
            </div>

        </div>
    </div>
</section>

{{-- BERITA --}}
<section id="berita" class="scroll-mt-28 bg-[#f8fafc] px-6 py-28">
    <div class="mx-auto max-w-6xl">
        <div class="section-reveal mt-12 rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                ◷
            </div>

            <h3 class="mt-5 text-lg font-bold text-slate-900">
                {{ $news['news_empty_title'] ?? 'Informasi akan segera hadir' }}
            </h3>

            <p class="mt-2 text-sm text-slate-500">
                {{ $news['news_empty_description'] ?? 'Berita dan informasi terbaru akan ditampilkan di sini.' }}
            </p>
        </div>

    </div>
</section>

{{-- KEGIATAN --}}
<section id="kegiatan" class="scroll-mt-28 bg-white px-6 py-28">
    <div class="mx-auto max-w-6xl">

        <div class="section-reveal">
            <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                {{ $activity['activity_label'] ?? 'AKTIVITAS KAMI' }}
            </p>

            <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                {{ $activity['activity_title'] ?? 'Dari rencana menjadi aksi.' }}
            </h2>

            <p class="mt-5 max-w-xl leading-8 text-slate-500">
                {{ $activity['activity_description'] ?? 'Berbagai kegiatan menjadi ruang untuk belajar, berkolaborasi, dan memberikan dampak nyata.' }}
            </p>
        </div>

        <div class="section-reveal mt-12 flex flex-col items-start justify-between gap-6 rounded-3xl bg-slate-100 p-8 sm:flex-row sm:items-center sm:p-12">

            <div>
                <p class="text-sm text-slate-400">
                    {{ $activity['activity_card_label'] ?? 'JELAJAHI AKTIVITAS' }}
                </p>

                <h3 class="mt-3 text-2xl font-bold text-slate-900">
                    {{ $activity['activity_card_title'] ?? 'Lihat perjalanan kegiatan kami.' }}
                </h3>
            </div>

            <a href="{{ url('/kegiatan') }}"
                class="rounded-full bg-slate-950 px-7 py-4 text-sm font-semibold text-white transition hover:-translate-y-1">
                {{ $activity['activity_button'] ?? 'Lihat Kegiatan' }} ↗
            </a>

        </div>
    </div>
</section>

{{-- GALERI --}}
<section id="galeri" class="scroll-mt-28 bg-[#f8fafc] px-6 py-28">
    <div class="mx-auto max-w-6xl">

        <div class="section-reveal flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                    {{ $gallery['gallery_label'] ?? 'DOKUMENTASI' }}
                </p>

                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                    {{ $gallery['gallery_title'] ?? 'Momen kebersamaan.' }}
                </h2>
            </div>

            <a href="{{ url('/galeri') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-950">
                Buka galeri ↗
            </a>
        </div>

        <div class="section-reveal mt-12 grid gap-4 sm:grid-cols-3">
            <div class="flex min-h-56 items-center justify-center rounded-3xl bg-slate-200 text-sm text-slate-500">
                Dokumentasi 01
            </div>

            <div class="flex min-h-56 items-center justify-center rounded-3xl bg-slate-300 text-sm text-slate-600">
                Dokumentasi 02
            </div>

            <div class="flex min-h-56 items-center justify-center rounded-3xl bg-slate-200 text-sm text-slate-500">
                Dokumentasi 03
            </div>
        </div>

    </div>
</section>

{{-- STRUKTUR ORGANISASI --}}
<section id="struktur" class="scroll-mt-28 bg-white px-6 py-28">
    <div class="section-reveal mx-auto max-w-6xl rounded-[2rem] border border-slate-200 p-8 sm:p-14">

        <div class="grid gap-8 md:grid-cols-2 md:items-center">

            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">
                    {{ $structure['structure_label'] ?? 'STRUKTUR ORGANISASI' }}
                </p>

                <h2 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-slate-950 sm:text-5xl">
                    {{ $structure['structure_title'] ?? 'Kenali susunan kepengurusan kami.' }}
                </h2>
            </div>

            <div>
                <p class="leading-8 text-slate-500">
                    {{ $structure['structure_description'] ?? 'Lihat susunan pengurus dan pembagian peran dalam organisasi Karang Taruna.' }}
                </p>

                <a href="{{ url('/struktur') }}"
                    class="mt-7 inline-flex rounded-full bg-slate-950 px-7 py-4 text-sm font-semibold text-white transition hover:-translate-y-1">
                    {{ $structure['structure_button'] ?? 'Lihat Struktur' }} ↗
                </a>
            </div>

        </div>
    </div>
</section>

@endsection


@push('script')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (!window.gsap) return;

        gsap.from('.hero-content', {
            opacity: 0,
            y: 35,
            duration: 1,
            ease: 'power3.out'
        });

        gsap.from('.hero-visual', {
            opacity: 0,
            y: 45,
            scale: 0.97,
            duration: 1.2,
            delay: 0.15,
            ease: 'power3.out'
        });

        const elements = gsap.utils.toArray('.section-reveal');

        gsap.fromTo(elements, {
            autoAlpha: 0,
            y: 30
        }, {
            autoAlpha: 1,
            y: 0,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power2.out',
            clearProps: 'opacity,visibility,transform'
        });
    });
</script>
@endpush