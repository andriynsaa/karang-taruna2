@extends('layouts.app')

@section('title', 'Beranda | Karang Taruna')

@section('content')



{{-- HERO FOTO FULL WIDTH --}}
<section id="beranda" class="w-full">

    {{-- FOTO UTAMA --}}
    <div class="relative h-[65vh] min-h-[430px] max-h-[760px] w-full overflow-hidden sm:h-[78vh]">
        <img
            src="{{ asset('images/hero-karang-taruna.jpg') }}"
            alt="Kebersamaan anggota Karang Taruna"
            class="h-full w-full object-cover object-center">

        <div class="absolute inset-0 bg-gradient-to-b from-black/10 via-transparent to-black/30"></div>
    </div>

    {{-- KONTEN HERO AWAL, DIPINDAHKAN KE BAWAH FOTO --}}
    <div class="relative overflow-hidden bg-[#f8fafc] px-6 py-20 sm:py-28">

        <div class="pointer-events-none absolute -right-40 top-10 h-96 w-96 rounded-full bg-blue-100/60 blur-[100px]"></div>

        <div class="relative mx-auto grid w-full max-w-6xl items-center gap-14 lg:grid-cols-2">

            {{-- BAGIAN KIRI --}}
            <div class="hero-content">

                <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-xs font-semibold text-slate-600 shadow-sm backdrop-blur">
                    <span class="h-2 w-2 rounded-full bg-emerald-500"></span>
                    ORGANISASI KEPEMUDAAN
                </div>

                <h1 class="max-w-2xl text-5xl font-bold leading-[1.12] tracking-tight text-slate-950 sm:text-6xl lg:text-7xl">
                    Berkolaborasi Bersama,
                    <span class="text-slate-400">Berkarya</span>
                    untuk Sesama.
                </h1>

                <p class="mt-7 max-w-lg text-base leading-8 text-slate-500 sm:text-lg">
                    Ruang bagi generasi muda untuk tumbuh, berkolaborasi,
                    dan memberikan kontribusi positif bagi lingkungan masyarakat.
                </p>

                <div class="mt-14 flex items-center gap-8 border-t border-slate-200 pt-7">
                    <div>
                        <p class="text-2xl font-bold text-slate-950">01</p>
                        <p class="mt-1 text-xs text-slate-500">Kebersamaan</p>
                    </div>

                    <div class="h-10 w-px bg-slate-200"></div>

                    <div>
                        <p class="text-2xl font-bold text-slate-950">02</p>
                        <p class="mt-1 text-xs text-slate-500">Kreativitas</p>
                    </div>

                    <div class="h-10 w-px bg-slate-200"></div>

                    <div>
                        <p class="text-2xl font-bold text-slate-950">03</p>
                        <p class="mt-1 text-xs text-slate-500">Kontribusi</p>
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
                                KARANG TARUNA
                            </span>

                        </div>

                        <div>
                            <div class="mb-5 flex h-16 w-16 items-center justify-center rounded-2xl border border-white/20 bg-white/10 text-3xl text-white backdrop-blur">
                                ✳
                            </div>

                            <h2 class="max-w-sm text-4xl font-bold leading-tight tracking-tight text-white sm:text-5xl">
                                Satu Gerakan,
                                <span class="text-slate-400">Banyak Perubahan.</span>
                            </h2>

                            <p class="mt-5 max-w-xs text-sm leading-7 text-white/50">
                                Bersama menciptakan lingkungan yang aktif,
                                kreatif, dan penuh kepedulian.
                            </p>
                        </div>

                        <div class="flex items-end justify-between border-t border-white/15 pt-5">
                            <div>
                                <p class="text-xs text-white/40">TUMBUH BERSAMA</p>
                                <p class="mt-1 text-sm font-semibold text-white">Untuk masa depan</p>
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
            <p class="text-xs font-bold tracking-[0.25em] text-slate-400">TENTANG KAMI</p>

            <h2 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-slate-950 sm:text-5xl">
                Anak muda punya peran dalam perubahan.
            </h2>
        </div>

        <div class="section-reveal">
            <p class="text-base leading-8 text-slate-500">
                Karang Taruna merupakan wadah bagi generasi muda untuk
                mengembangkan potensi, membangun kepedulian sosial,
                serta berpartisipasi dalam kegiatan positif di lingkungan masyarakat.
            </p>

            <a href="{{ url('/profil') }}"
                class="mt-7 inline-flex items-center gap-3 border-b border-slate-900 pb-2 text-sm font-semibold text-slate-900 transition hover:gap-5">
                Pelajari profil kami <span>↗</span>
            </a>
        </div>

    </div>
</section>


{{-- DIVISI --}}
<section id="divisi" class="scroll-mt-28 bg-[#f8fafc] px-6 py-28">
    <div class="mx-auto max-w-6xl">

        <div class="section-reveal flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">BIDANG ORGANISASI</p>
                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                    Bergerak dalam divisi.
                </h2>
            </div>

            <a href="{{ url('/divisi') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-950">
                Lihat semua divisi ↗
            </a>
        </div>

        <div class="mt-12 grid gap-5 md:grid-cols-3">
            @foreach ([
            ['01', 'Pengembangan', 'Mengembangkan potensi dan kreativitas generasi muda.'],
            ['02', 'Sosial', 'Membangun kepedulian dan semangat gotong royong.'],
            ['03', 'Kegiatan', 'Menghadirkan kegiatan positif bagi masyarakat.']
            ] as $item)
            <div class="section-reveal group rounded-3xl border border-slate-200 bg-white p-8 transition duration-300 hover:-translate-y-2 hover:shadow-xl hover:shadow-slate-900/5">
                <p class="text-sm font-bold text-slate-300">{{ $item[0] }}</p>

                <h3 class="mt-12 text-2xl font-bold text-slate-900">
                    {{ $item[1] }}
                </h3>

                <p class="mt-4 text-sm leading-7 text-slate-500">
                    {{ $item[2] }}
                </p>

                <div class="mt-8 flex h-10 w-10 items-center justify-center rounded-full bg-slate-100 text-slate-700 transition group-hover:bg-slate-950 group-hover:text-white">
                    ↗
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>


{{-- ANGGOTA --}}
<section id="anggota" class="scroll-mt-28 bg-white px-6 py-28">
    <div class="section-reveal mx-auto max-w-6xl rounded-[2rem] bg-slate-950 px-8 py-14 text-white sm:px-14">
        <div class="grid gap-10 md:grid-cols-2 md:items-center">
            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-white/40">SUMBER KEKUATAN KAMI</p>

                <h2 class="mt-5 text-4xl font-bold leading-tight sm:text-5xl">
                    Setiap anggota punya cerita dan kontribusi.
                </h2>
            </div>

            <div>
                <p class="leading-8 text-white/55">
                    Kenali orang-orang yang menjadi bagian dari perjalanan
                    dan kegiatan Karang Taruna.
                </p>

                <a href="{{ url('/anggota') }}"
                    class="mt-7 inline-flex rounded-full bg-white px-6 py-3 text-sm font-semibold text-slate-950 transition hover:-translate-y-1">
                    Kenali Anggota ↗
                </a>
            </div>
        </div>
    </div>
</section>


{{-- BERITA --}}
<section id="berita" class="scroll-mt-28 bg-[#f8fafc] px-6 py-28">
    <div class="mx-auto max-w-6xl">
        <div class="section-reveal flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">INFORMASI TERBARU</p>
                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                    Cerita dan kabar.
                </h2>
            </div>

            <a href="{{ url('/berita') }}" class="text-sm font-semibold text-slate-600 hover:text-slate-950">
                Semua berita ↗
            </a>
        </div>

        <div class="section-reveal mt-12 rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100 text-2xl">
                ◷
            </div>

            <h3 class="mt-5 text-lg font-bold text-slate-900">Informasi akan segera hadir</h3>

            <p class="mt-2 text-sm text-slate-500">
                Berita dan informasi terbaru akan ditampilkan di sini.
            </p>
        </div>
    </div>
</section>


{{-- KEGIATAN --}}
<section id="kegiatan" class="scroll-mt-28 bg-white px-6 py-28">
    <div class="mx-auto max-w-6xl">
        <div class="section-reveal">
            <p class="text-xs font-bold tracking-[0.25em] text-slate-400">AKTIVITAS KAMI</p>

            <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                Dari rencana menjadi aksi.
            </h2>

            <p class="mt-5 max-w-xl leading-8 text-slate-500">
                Berbagai kegiatan menjadi ruang untuk belajar, berkolaborasi,
                dan memberikan dampak nyata.
            </p>
        </div>

        <div class="section-reveal mt-12 flex flex-col items-start justify-between gap-6 rounded-3xl bg-slate-100 p-8 sm:flex-row sm:items-center sm:p-12">
            <div>
                <p class="text-sm text-slate-400">JELAJAHI AKTIVITAS</p>
                <h3 class="mt-3 text-2xl font-bold text-slate-900">
                    Lihat perjalanan kegiatan kami.
                </h3>
            </div>

            <a href="{{ url('/kegiatan') }}"
                class="rounded-full bg-slate-950 px-7 py-4 text-sm font-semibold text-white transition hover:-translate-y-1">
                Lihat Kegiatan ↗
            </a>
        </div>
    </div>
</section>


{{-- GALERI --}}
<section id="galeri" class="scroll-mt-28 bg-[#f8fafc] px-6 py-28">
    <div class="mx-auto max-w-6xl">
        <div class="section-reveal flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">DOKUMENTASI</p>
                <h2 class="mt-4 text-4xl font-bold tracking-tight text-slate-950 sm:text-5xl">
                    Momen kebersamaan.
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
                <p class="text-xs font-bold tracking-[0.25em] text-slate-400">STRUKTUR ORGANISASI</p>

                <h2 class="mt-5 text-4xl font-bold leading-tight tracking-tight text-slate-950 sm:text-5xl">
                    Kenali susunan kepengurusan kami.
                </h2>
            </div>

            <div>
                <p class="leading-8 text-slate-500">
                    Lihat susunan pengurus dan pembagian peran
                    dalam organisasi Karang Taruna.
                </p>

                <a href="{{ url('/struktur') }}"
                    class="mt-7 inline-flex rounded-full bg-slate-950 px-7 py-4 text-sm font-semibold text-white transition hover:-translate-y-1">
                    Lihat Struktur ↗
                </a>
            </div>
        </div>
    </div>
</section>


@endsection

@push('scripts')
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

        gsap.from('.section-reveal', {
            opacity: 0,
            y: 30,
            duration: 0.8,
            stagger: 0.12,
            ease: 'power2.out',
            scrollTrigger: undefined,
            onComplete: function() {
                // Animasi awal halaman selesai.
            }
        });
    });
</script>
@endpush