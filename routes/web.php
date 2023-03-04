<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LelangController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListlelangController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/', [usercontroller::class, 'home'])->name('home');

// route::resource('lelang', LelangController::class);

// route::resource('profile', ProfileController::class);

route::resource('history', HistoryController::class);

// route::get('listlelang', [LelangController::class, 'listlelangindex'])->name('listlelang.index');

// route::resource('barang', BarangController::class);

// route::resource('user', usercontroller::class);

// route login
route::get('login', [LoginController::class, 'view'])->name('login')->middleware('guest');
route::post('login', [LoginController::class, 'proses'])->name('login.proses')->middleware('guest');
route::get('logout', [LoginController::class, 'logout'])->name('logout-petugas');

// route register
route::get('register', [RegisterController::class, 'view'])->name('register')->middleware(('guest'));
route::post('register', [RegisterController::class, 'store'])->name('register-store')->middleware(('guest'));

// route login sesuai role
route::get('/dashboard/admin', [Dashboard::class, 'admin'])->name('dashboard.admin')->middleware('auth', 'level:admin');
route::get('/dashboard/petugas', [Dashboard::class, 'petugas'])->name('dashboard.petugas')->middleware('auth', 'level:petugas');
route::get('/dashboard/masyarakat', [Dashboard::class, 'masyarakat'])->name('dashboard.masyarakat')->middleware('auth', 'level:masyarakat');

// route login / error
route::view('error/403', 'error.403')->name('error.403');

// route admin dan petugas
route::middleware(['auth', 'level:admin,petugas'])->group(function () {
    route::controller(BarangController::class)->group(function () {
        route::get('barang', 'index')->name('barang.index');
        route::get('barang/create', 'create')->name('barang.create');
        route::post('barang', 'store')->name('barang.store');
        route::get('barang/{barang}', 'show')->name('barang.show');
        route::get('barang/{barang}/edit', 'edit')->name('barang.edit');
        route::put('barang/{barang}', 'update')->name('barang.update');
        route::delete('barang/{barang}', 'destroy')->name('barang.destroy');
    });
});

// route masyarakat dan petugas
route::middleware(['auth', 'level:petugas,masyarakat'])->group(function () {
    route::controller(LelangController::class)->group(function () {
        route::get('lelang', 'index')->name('lelang.index');
        route::get('lelang/create/{lelang}', 'tawar')->name('tawar');
        route::get('lelang/{lelang}', 'show')->name('lelang.show');
        route::put('lelang/{lelang}', 'update')->name('lelang.update');
    });
});

// middleware only admin    
route::middleware(['auth', 'level:admin'])->group(function () {
    route::controller(usercontroller::class)->group(function () {
        route::get('user', 'index')->name('user.index');
        route::get('user/create', 'create')->name('user.create');
        route::post('user', 'store')->name('user.store');
        route::get('user/{user}', 'show')->name('user.show');
        route::get('user/{user}/edit', 'edit')->name('user.edit');
        route::put('user/{user}', 'update')->name('user.update');
        route::delete('user/{user}', 'destroy')->name('user.destroy');
    });
});

route::middleware(['auth', 'level:petugas'])->group(function () {
    route::controller(LelangController::class)->group(function () {
        route::get('lelang/create', 'create')->name('lelang.create');
        route::post('lelang', 'store')->name('lelang.store');
    });
});

// middleware only masyarakat
route::middleware(['auth', 'level:masyarakat'])->group(function () {
    route::controller(usercontroller::class)->group(function () {
        route::get('/profile', 'profile')->name('profile.index');
        route::put('/profile/{user}/', 'update')->name('profile.edit');
    });
});
