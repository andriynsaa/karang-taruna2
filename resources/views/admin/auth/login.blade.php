
@php
    $siteName = \App\Models\SiteSetting::getValue('site_name', 'Karang Taruna');
    $siteLogo = \App\Models\SiteSetting::getValue('site_logo');

    $siteLogoUrl = $siteLogo
        ? (str_starts_with($siteLogo, 'site-settings/')
            ? asset('storage/' . $siteLogo)
            : asset($siteLogo))
        : null;
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | {{ $siteName }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-slate-50 text-slate-800 antialiased">

    <main class="flex min-h-screen items-center justify-center px-4 py-10">
        <div class="w-full max-w-md">

            <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-xl shadow-slate-200/50 sm:p-10">

                <div class="mb-8 text-center">

                    @if($siteLogoUrl)
                        <img
                            src="{{ $siteLogoUrl }}"
                            alt="{{ $siteName }}"
                            class="mx-auto mb-5 h-16 w-16 rounded-2xl border border-slate-100 object-contain"
                        >
                    @else
                        <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-2xl bg-slate-900 text-xl font-bold text-white">
                            KT
                        </div>
                    @endif

                    <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                        Admin Panel
                    </h1>

                    <p class="mt-2 text-sm font-semibold text-slate-700">
                        {{ $siteName }}
                    </p>

                    <p class="mt-2 text-sm leading-relaxed text-slate-500">
                        Silakan masuk untuk mengelola website {{ $siteName }}.
                    </p>

                </div>

                @if(session('error'))
                    <div class="mb-5 rounded-xl border border-red-100 bg-red-50 p-3 text-sm text-red-700">
                        {{ session('error') }}
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-5 rounded-xl border border-green-100 bg-green-50 p-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-5 rounded-xl border border-red-100 bg-red-50 p-3 text-sm text-red-700">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('admin.login.process') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                            Email Admin
                        </label>

                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-slate-900 focus:ring-4 focus:ring-slate-900/5"
                            placeholder="admin@email.com">
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold text-slate-700">
                            Password
                        </label>

                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm outline-none transition placeholder:text-slate-400 focus:border-slate-900 focus:ring-4 focus:ring-slate-900/5"
                            placeholder="Masukkan password">
                    </div>

                    <label class="flex cursor-pointer items-center gap-2 text-sm text-slate-600">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="h-4 w-4 rounded border-slate-300 accent-slate-900">
                        Ingat saya
                    </label>

                    <button
                        type="submit"
                        class="w-full rounded-xl bg-slate-900 px-5 py-3.5 text-sm font-semibold text-white shadow-lg shadow-slate-900/10 transition hover:-translate-y-0.5 hover:bg-slate-700 hover:shadow-xl active:translate-y-0">
                        Masuk ke Dashboard
                    </button>
                </form>

                <div class="mt-7 border-t border-slate-100 pt-6">
                    <a
                        href="{{ route('home') }}"
                        class="block text-center text-sm font-medium text-slate-500 transition hover:text-slate-900">
                        ← Kembali ke website
                    </a>
                </div>

            </div>

            <p class="mt-6 text-center text-xs text-slate-400">
                © {{ date('Y') }} {{ $siteName }}
            </p>

        </div>
    </main>

</body>
</html>
