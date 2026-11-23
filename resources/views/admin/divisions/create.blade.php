
@extends('admin.layouts.app')

@section('title', 'Tambah Divisi')

@section('content')
<div class="p-4 sm:p-6 lg:p-8">
    <div class="mx-auto max-w-3xl">

        <div class="mb-6">
            <a href="{{ route('admin.divisions.index') }}"
                class="text-sm font-medium text-slate-500 hover:text-slate-900">
                ← Kembali ke Kelola Divisi
            </a>

            <h2 class="mt-4 text-2xl font-bold text-slate-900">
                Tambah Divisi
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Tambahkan informasi dan foto divisi organisasi.
            </p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

            <form action="{{ route('admin.divisions.store') }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-6">

                @csrf

                <div>
                    <label for="nama_divisi" class="mb-2 block text-sm font-semibold text-slate-700">
                        Nama Divisi
                    </label>

                    <input
                        type="text"
                        id="nama_divisi"
                        name="nama_divisi"
                        value="{{ old('nama_divisi') }}"
                        placeholder="Contoh: Divisi Acara"
                        required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">

                    @error('nama_divisi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="mb-2 block text-sm font-semibold text-slate-700">
                        Deskripsi Divisi
                    </label>

                    <textarea
                        id="deskripsi"
                        name="deskripsi"
                        rows="5"
                        placeholder="Jelaskan tugas dan tanggung jawab divisi..."
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">{{ old('deskripsi') }}</textarea>

                    @error('deskripsi')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="foto" class="mb-2 block text-sm font-semibold text-slate-700">
                        Foto Divisi
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

                <div>
                    <label for="urutan" class="mb-2 block text-sm font-semibold text-slate-700">
                        Urutan Tampil
                    </label>

                    <input
                        type="number"
                        id="urutan"
                        name="urutan"
                        value="{{ old('urutan', $nextOrder ?? 1) }}"
                        min="0"
                        required
                        class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10">

                    <p class="mt-2 text-xs text-slate-400">
                        Angka lebih kecil akan ditampilkan lebih dahulu.
                    </p>

                    @error('urutan')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                    <a href="{{ route('admin.divisions.index') }}"
                        class="rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-semibold text-slate-600 transition hover:bg-slate-50">
                        Batal
                    </a>

                    <button type="submit"
                        class="rounded-xl bg-slate-900 px-5 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
                        Simpan Divisi
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
