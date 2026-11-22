@extends('admin.layouts.app')

@section('title', 'Login Admin')

@section('content')
<div class="flex min-h-screen items-center justify-center px-4 py-10">
    <div class="w-full max-w-md rounded-3xl bg-white p-7 shadow-xl sm:p-10">

        <div class="mb-8 text-center">
            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-900 text-xl font-bold text-white">
                KT
            </div>

            <h1 class="text-2xl font-bold">Admin Panel</h1>
            <p class="mt-2 text-sm text-slate-500">
                Silakan masuk untuk mengelola website Karang Taruna.
            </p>
        </div>

        @if(session('error'))
            <div class="mb-5 rounded-xl bg-red-50 p-3 text-sm text-red-700">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="mb-5 rounded-xl bg-green-50 p-3 text-sm text-green-700">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-5 rounded-xl bg-red-50 p-3 text-sm text-red-700">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.process') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="mb-2 block text-sm font-semibold">Email Admin</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10"
                    placeholder="admin@email.com">
            </div>

            <div>
                <label class="mb-2 block text-sm font-semibold">Password</label>
                <input
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border border-slate-200 px-4 py-3 outline-none transition focus:border-slate-900 focus:ring-2 focus:ring-slate-900/10"
                    placeholder="Masukkan password">
            </div>

            <label class="flex items-center gap-2 text-sm text-slate-600">
                <input type="checkbox" name="remember" value="1" class="rounded">
                Ingat saya
            </label>

            <button
                type="submit"
                class="w-full rounded-xl bg-slate-900 px-5 py-3 font-semibold text-white transition hover:bg-slate-700">
                Masuk ke Dashboard
            </button>
        </form>

        <a href="{{ route('home') }}"
           class="mt-6 block text-center text-sm text-slate-500 hover:text-slate-900">
            ← Kembali ke website
        </a>
    </div>
</div>
@endsection