
@extends('admin.layouts.app')

@section('title', 'Kelola Divisi')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    {{-- HEADER --}}
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Kelola Divisi</h2>
            <p class="mt-1 text-sm text-slate-500">
                Atur informasi, foto, dan urutan divisi organisasi.
            </p>
        </div>

        <a href="{{ route('admin.divisions.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
            <span class="text-lg">+</span>
            Tambah Divisi
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
            <p class="font-semibold">Ada data yang perlu diperbaiki:</p>
            <ul class="mt-2 list-inside list-disc">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- JUMLAH DIVISI --}}
    <div class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
        <p class="text-sm text-slate-500">Total Divisi</p>
        <p class="mt-1 text-3xl font-bold text-slate-900">{{ $divisions->count() }}</p>
    </div>

    {{-- DAFTAR DIVISI --}}
    @if($divisions->isEmpty())
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <div class="text-4xl text-slate-300">▤</div>
            <h3 class="mt-4 font-semibold text-slate-800">Belum ada divisi</h3>
            <p class="mt-2 text-sm text-slate-500">
                Tambahkan divisi pertama organisasi lo.
            </p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($divisions as $division)
                <div class="flex flex-col gap-5 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm sm:flex-row sm:items-center sm:p-5">

                    {{-- FOTO --}}
                    <div class="h-28 w-full shrink-0 overflow-hidden rounded-xl bg-slate-100 sm:h-24 sm:w-32">
                        @if($division->foto)
                            <img
                                src="{{ asset('storage/' . $division->foto) }}"
                                alt="Foto {{ $division->nama_divisi }}"
                                class="h-full w-full object-cover">
                        @else
                            <div class="flex h-full w-full items-center justify-center text-xs font-medium text-slate-400">
                                Belum ada foto
                            </div>
                        @endif
                    </div>

                    {{-- INFORMASI --}}
                    <div class="min-w-0 flex-1">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-bold text-slate-500">
                                {{ str_pad($division->urutan, 2, '0', STR_PAD_LEFT) }}
                            </span>

                            <h3 class="text-lg font-bold text-slate-900">
                                {{ $division->nama_divisi }}
                            </h3>
                        </div>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            {{ $division->deskripsi ?: 'Belum ada deskripsi divisi.' }}
                        </p>
                    </div>

                    {{-- AKSI --}}
                    <div class="flex shrink-0 gap-2 sm:flex-col">
                        <a href="{{ route('admin.divisions.edit', $division) }}"
                            class="flex-1 rounded-xl border border-slate-200 px-4 py-2.5 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50 sm:flex-none">
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.divisions.destroy', $division) }}"
                            method="POST"
                            class="flex-1 sm:flex-none"
                            onsubmit="return confirm('Yakin ingin menghapus divisi ini?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="w-full rounded-xl border border-red-200 px-4 py-2.5 text-sm font-semibold text-red-600 transition hover:bg-red-50">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    @endif

</div>
@endsection
