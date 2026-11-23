
@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')
<div class="min-h-screen bg-slate-100 px-4 py-8 sm:px-6 lg:px-8">
    <div class="mx-auto max-w-6xl">

        <div class="mb-8">
            <h1 class="mt-4 text-2xl font-bold text-slate-900">
                Pengaturan Website
            </h1>

            <p class="mt-2 text-sm text-slate-500">
                Kelola identitas dan konten halaman website Karang Taruna.
            </p>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                <p class="font-semibold">Ada kesalahan pada pengisian:</p>
                <ul class="mt-2 list-inside list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.content.update') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            @foreach($settings as $group => $items)
                <section class="mb-6 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-7">

                    <div class="mb-6 border-b border-slate-100 pb-4">
                        <h2 class="text-lg font-semibold capitalize text-slate-900">
                            {{ str_replace('_', ' ', $group) }}
                        </h2>
                        <p class="mt-1 text-sm text-slate-500">
                            Kelola pengaturan bagian ini.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        @foreach($items as $setting)
                            <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">

                                <label for="{{ $setting->key }}"
                                       class="mb-2 block text-sm font-medium text-slate-700">
                                    {{ $setting->label }}
                                </label>

                                @if($setting->type === 'image')

                                    @if($setting->value)
                                        <div class="mb-3">
                                            <img
                                                src="{{ str_starts_with($setting->value, 'site-settings/') ? asset('storage/'.$setting->value) : asset($setting->value) }}"
                                                alt="{{ $setting->label }}"
                                                class="max-h-48 max-w-full rounded-xl border border-slate-200 object-contain"
                                            >
                                        </div>
                                    @endif

                                    <input
                                        type="file"
                                        id="{{ $setting->key }}"
                                        name="settings[{{ $setting->key }}]"
                                        accept=".jpg,.jpeg,.png,.webp"
                                        class="block w-full rounded-xl border border-slate-300 bg-white text-sm text-slate-600 file:mr-4 file:border-0 file:bg-slate-100 file:px-4 file:py-3 file:text-sm file:font-medium hover:file:bg-slate-200"
                                    >

                                    <p class="mt-2 text-xs text-slate-400">
                                        JPG, PNG, WEBP. Maksimal 5 MB.
                                    </p>

                                @elseif($setting->type === 'textarea')

                                    <textarea
                                        id="{{ $setting->key }}"
                                        name="settings[{{ $setting->key }}]"
                                        rows="4"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-100"
                                    >{{ old('settings.'.$setting->key, $setting->value) }}</textarea>

                                @else

                                    <input
                                        type="text"
                                        id="{{ $setting->key }}"
                                        name="settings[{{ $setting->key }}]"
                                        value="{{ old('settings.'.$setting->key, $setting->value) }}"
                                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-slate-500 focus:ring-2 focus:ring-slate-100"
                                    >

                                @endif
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach

            <div class="sticky bottom-4 flex justify-end">
                <button
                    type="submit"
                    class="rounded-xl bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-slate-700"
                >
                    Simpan Pengaturan
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
