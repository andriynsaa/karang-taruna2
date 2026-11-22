@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="min-h-screen">

    <header class="border-b border-slate-200 bg-white px-5 py-4 sm:px-8">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4">
            <div>
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <p class="text-xs text-slate-500">Karang Taruna</p>
            </div>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="rounded-xl bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-100">
                    Keluar
                </button>
            </form>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-8 sm:px-8">
        <div class="mb-8">
            <p class="text-sm text-slate-500">Selamat datang,</p>
            <h2 class="mt-1 text-3xl font-bold">
                {{ auth()->user()->name }}
            </h2>
            <p class="mt-2 text-slate-500">
                Kelola konten website Karang Taruna melalui halaman ini.
            </p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <h3 class="text-lg font-bold">Dashboard berhasil dibuat!</h3>
            <p class="mt-2 text-sm text-slate-500">
                Selanjutnya kita akan menambahkan fitur pengelolaan tulisan,
                foto, berita, kegiatan, dan identitas organisasi.
            </p>
        </div>
    </main>

</div>
@endsection