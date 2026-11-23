
@extends('admin.layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-3xl">

        {{-- HEADER --}}
        <div class="mb-6">
            <a href="{{ route('admin.members.index') }}"
                class="text-sm font-medium text-slate-500 hover:text-slate-900">
                ← Kembali ke Kelola Anggota
            </a>

            <h2 class="mt-4 text-2xl font-bold text-slate-900">
                Tambah Anggota
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Masukkan identitas dan jabatan anggota dalam divisi.
            </p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <form action="{{ route('admin.members.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf

                {{-- NAMA LENGKAP --}}
                <div>
                    <label for="nama_lengkap"
                        class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Lengkap
                    </label>

                    <input
                        type="text"
                        id="nama_lengkap"
                        name="nama_lengkap"
                        value="{{ old('nama_lengkap') }}"
                        placeholder="Masukkan nama lengkap"
                        required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">

                    @error('nama_lengkap')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- PILIH DIVISI --}}
                <div>
                    <label for="division_id"
                        class="mb-2 block text-sm font-semibold text-slate-700">
                        Divisi
                    </label>

                    <select
                        id="division_id"
                        name="division_id"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">

                        <option value="">Pilih Divisi</option>

                        @foreach($divisions as $division)
                            <option
                                value="{{ $division->id }}"
                                @selected(old('division_id') == $division->id)>
                                {{ $division->nama_divisi }}
                            </option>
                        @endforeach
                    </select>

                    @if($divisions->isEmpty())
                        <p class="mt-2 text-sm text-amber-600">
                            Belum ada divisi. Tambahkan divisi terlebih dahulu.
                        </p>
                    @endif

                    @error('division_id')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- JABATAN --}}
                <div>
                    <label for="jabatan"
                        class="mb-2 block text-sm font-semibold text-slate-700">
                        Jabatan
                    </label>

                    <select
                        id="jabatan"
                        name="jabatan"
                        required
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">

                        <option value="">Pilih Jabatan</option>
                        <option value="ketua" @selected(old('jabatan') === 'ketua')>
                            Ketua
                        </option>
                        <option value="wakil" @selected(old('jabatan') === 'wakil')>
                            Wakil Ketua
                        </option>
                        <option value="anggota" @selected(old('jabatan') === 'anggota')>
                            Anggota
                        </option>
                    </select>

                    <p class="mt-2 text-xs text-slate-400">
                        Setiap divisi hanya memiliki satu Ketua dan satu Wakil Ketua.
                    </p>

                    @error('jabatan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- FOTO --}}
                <div>
                    <label for="foto"
                        class="mb-2 block text-sm font-semibold text-slate-700">
                        Foto Anggota
                        <span class="font-normal text-slate-400">(Opsional)</span>
                    </label>

                    <input
                        type="file"
                        id="foto"
                        name="foto"
                        accept="image/jpeg,image/png,image/webp"
                        class="w-full rounded-xl border border-slate-200 bg-white text-sm text-slate-600 file:mr-4 file:border-0 file:bg-slate-100 file:px-4 file:py-3 file:text-sm file:font-semibold file:text-slate-700 hover:file:bg-slate-200">

                    <p class="mt-2 text-xs text-slate-400">
                        Format JPG, JPEG, PNG, atau WEBP. Maksimal 5 MB.
                    </p>

                    @error('foto')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- URUTAN --}}
                <div>
                    <label for="urutan"
                        class="mb-2 block text-sm font-semibold text-slate-700">
                        Urutan Tampil
                    </label>

                    <input
                        type="number"
                        id="urutan"
                        name="urutan"
                        value="{{ old('urutan', 0) }}"
                        min="0"
                        required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">

                    <p class="mt-2 text-xs text-slate-400">
                        Angka lebih kecil akan ditampilkan lebih dahulu. Ketua dan Wakil Ketua tetap diprioritaskan.
                    </p>

                    @error('urutan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- TOMBOL --}}
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">

                    <a href="{{ route('admin.members.index') }}"
                        class="rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        Batal
                    </a>

                    <button
                        type="submit"
                        @if($divisions->isEmpty()) disabled @endif
                        class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700 disabled:cursor-not-allowed disabled:opacity-50">
                        Simpan Anggota
                    </button>

                </div>

            </form>
        </div>
    </div>
</div>
@endsection
