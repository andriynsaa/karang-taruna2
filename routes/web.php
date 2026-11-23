
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\DivisionController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Public\DivisionController as PublicDivisionController;

Route::get('/', function () {
    return view('public.home');
})->name('home');

// HALAMAN PUBLIK DIVISI
Route::get('/divisi', [PublicDivisionController::class, 'index'])
    ->name('public.divisions.index');

Route::get('/divisi/{division}', [PublicDivisionController::class, 'show'])
    ->name('public.divisions.show');

// LOGIN DAN ADMIN PANEL
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');

    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        // PENGELOLAAN DIVISI
        Route::resource('divisions', DivisionController::class);

        // PENGELOLAAN ANGGOTA
        Route::resource('members', MemberController::class);

        // PENGELOLAAN KONTEN WEBSITE
        Route::prefix('content')->name('content.')->group(function () {

            Route::get('/', [SiteSettingController::class, 'index'])
                ->name('index');

            Route::put('/', [SiteSettingController::class, 'update'])
                ->name('update');
        });

        Route::post('/logout', [AuthController::class, 'logout'])
            ->name('logout');
    });
});
