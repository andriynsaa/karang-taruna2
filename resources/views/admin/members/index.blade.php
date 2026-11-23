
@extends('admin.layouts.app')

@section('title', 'Kelola Anggota')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">

    {{-- HEADER --}}
    <div class="mb-8 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h2 class="text-2xl font-bold text-slate-900">Kelola Anggota</h2>
            <p class="mt-1 text-sm text-slate-500">
                Atur data Ketua, Wakil Ketua, dan anggota setiap divisi.
            </p>
        </div>

        <a href="{{ route('admin.members.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
            <span class="text-lg">+</span>
            Tambah Anggota
        </a>
    </div>

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
            {{ session('success') }}
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

    {{-- RINGKASAN --}}
    <div class="mb-6 grid gap-4 sm:grid-cols-2">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Total Anggota</p>
            <p class="mt-1 text-3xl font-bold text-slate-900">
                {{ $members->count() }}
            </p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <p class="text-sm text-slate-500">Total Divisi Terisi</p>
            <p class="mt-1 text-3xl font-bold text-slate-900">
                {{ $members->pluck('division_id')->unique()->count() }}
            </p>
        </div>
    </div>

    {{-- DAFTAR ANGGOTA --}}
    @if($members->isEmpty())
        <div class="rounded-2xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <div class="text-4xl text-slate-300">♙</div>

            <h3 class="mt-4 font-semibold text-slate-800">
                Belum ada anggota
            </h3>

            <p class="mt-2 text-sm text-slate-500">
                Tambahkan Ketua, Wakil Ketua, atau anggota pertama.
            </p>
        </div>
    @else
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px] text-left">
                    <thead class="border-b border-slate-200 bg-slate-50">
                        <tr>
                            <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Anggota</th>
                            <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Divisi</th>
                            <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Jabatan</th>
                            <th class="px-5 py-4 text-xs font-bold uppercase tracking-wider text-slate-500">Urutan</th>
                            <th class="px-5 py-4 text-right text-xs font-bold uppercase tracking-wider text-slate-500">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @foreach($members as $member)
                            <tr class="transition hover:bg-slate-50">

                                {{-- FOTO DAN NAMA --}}
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($member->foto)
                                            <img
                                                src="{{ asset('storage/' . $member->foto) }}"
                                                alt="{{ $member->nama_lengkap }}"
                                                class="h-11 w-11 rounded-full object-cover">
                                        @else
                                            <div class="flex h-11 w-11 items-center justify-center rounded-full bg-slate-100 text-lg font-bold text-slate-400">
                                                {{ strtoupper(substr($member->nama_lengkap, 0, 1)) }}
                                            </div>
                                        @endif

                                        <span class="text-sm font-semibold text-slate-800">
                                            {{ $member->nama_lengkap }}
                                        </span>
                                    </div>
                                </td>

                                {{-- DIVISI --}}
                                <td class="px-5 py-4 text-sm text-slate-600">
                                    {{ $member->division?->nama_divisi ?? 'Divisi tidak ditemukan' }}
                                </td>

                                {{-- JABATAN --}}
                                <td class="px-5 py-4">
                                    @php
                                        $jabatanLabel = [
                                            'ketua' => 'Ketua',
                                            'wakil' => 'Wakil Ketua',
                                            'anggota' => 'Anggota',
                                        ];
                                    @endphp

                                    <span class="rounded-lg px-3 py-1.5 text-xs font-semibold
                                        {{ $member->jabatan === 'ketua'
                                            ? 'bg-amber-50 text-amber-700'
                                            : ($member->jabatan === 'wakil'
                                                ? 'bg-blue-50 text-blue-700'
                                                : 'bg-slate-100 text-slate-600') }}">
                                        {{ $jabatanLabel[$member->jabatan] ?? ucfirst($member->jabatan) }}
                                    </span>
                                </td>

                                {{-- URUTAN --}}
                                <td class="px-5 py-4 text-sm text-slate-600">
                                    {{ $member->urutan }}
                                </td>

                                {{-- AKSI --}}
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.members.edit', $member) }}"
                                            class="rounded-lg border border-slate-200 px-3 py-2 text-xs font-semibold text-slate-600 transition hover:bg-slate-100">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.members.destroy', $member) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus anggota ini?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="rounded-lg border border-red-200 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

</div>
@endsection
