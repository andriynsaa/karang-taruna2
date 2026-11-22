<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use App\Models\User;
use Illuminate\Support\Facades\Hash;

Artisan::command('admin:create', function () {
    $name = $this->ask('Nama admin');
    $email = $this->ask('Email admin');
    $password = $this->secret('Password admin');

    if (!$name || !$email || !$password) {
        $this->error('Semua data wajib diisi.');
        return;
    }

    if (User::where('email', $email)->exists()) {
        $this->error('Email tersebut sudah terdaftar.');
        return;
    }

    User::create([
        'name' => $name,
        'email' => $email,
        'password' => Hash::make($password),
        'is_admin' => true,
    ]);

    $this->info('Akun admin berhasil dibuat.');
})->purpose('Membuat akun admin pertama');