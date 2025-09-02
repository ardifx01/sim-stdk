<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

// Dashboard
use App\Livewire\Dashboard\Index as DashboardIndex;

// Anggota
use App\Livewire\Anggota\Index as AnggotaIndex;
use App\Livewire\Anggota\Create as AnggotaCreate;
use App\Livewire\Anggota\Verifikasi as AnggotaVerifikasi;
use App\Livewire\Anggota\Edit as AnggotaEdit;
use App\Livewire\Anggota\Show as AnggotaShow;


// Kegiatan
use App\Livewire\Kegiatan\Index as KegiatanIndex;
use App\Livewire\Kegiatan\Create as KegiatanCreate;
use App\Livewire\Kegiatan\Edit as KegiatanEdit;
use App\Livewire\Kegiatan\Show as KegiatanShow;


// Absensi
use App\Livewire\Absensi\Index as AbsensiIndex;

// Keuangan
use App\Livewire\Keuangan\Index as KeuanganIndex;
use App\Livewire\Keuangan\Create as KeuanganCreate;
use App\Livewire\Keuangan\Edit as KeuanganEdit;
use App\Livewire\Keuangan\Show as KeuanganShow;

// Galeri
use App\Livewire\Galeri\Index as GaleriIndex;
use App\Livewire\Galeri\Create as GaleriCreate;
use App\Livewire\Galeri\Edit as GaleriEdit;
use App\Livewire\Galeri\Show as GaleriShow;

// Inventaris
use App\Livewire\Inventaris\Index as InventarisIndex;
use App\Livewire\Inventaris\Create as InventarisCreate;
use App\Livewire\Inventaris\Edit as InventarisEdit;
use App\Livewire\Inventaris\Show as InventarisShow;


// Berita
use App\Livewire\Berita\Index as BeritaIndex;
use App\Livewire\Berita\Create as BeritaCreate;
use App\Livewire\Berita\Edit as BeritaEdit;
use App\Livewire\Berita\Show as BeritaShow;

// Profil
use App\Livewire\Profil\Index as ProfilIndex;
use App\Livewire\Profil\Update as ProfilUpdate;


// Users Landing page
use App\Livewire\Users\Berita;
use App\Livewire\Users\Home;
use App\Livewire\Users\Galeri;
use App\Livewire\Users\Kegiatan;
use App\Livewire\Users\Keuangan;

use App\Livewire\Auth\Register;

// Route::get('/landingpage', Login::class)->middleware('guest');
// Route::get('/landingpage', function () {
//     return view('layouts.landingpage');
// });

Route::get('/register', Register::class)->name('register')->middleware('guest');

Route::get('/', Login::class)->name('login')->middleware('guest');
Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::get('/', Home::class)->name('users.beranda');
Route::get('/kegiatan-stt', Kegiatan::class)->name('users.kegiatan');
Route::get('/keuangan-stt', Keuangan::class)->name('users.keuangan');
Route::get('/galeri-stt', Galeri::class)->name('users.galeri');
Route::get('/berita-stt', Berita::class)->name('users.berita');


Route::middleware(['auth', 'profil'])->group(function () {
    Route::prefix('profil')->group(function () {
        Route::get('/', ProfilIndex::class)->name('profil.index');
        Route::get('/update', ProfilUpdate::class)->name('profil.update');
        // Route::get('/create', ProfilCreate::class)->name('profil.create');
        // Route::get('/edit/{id}', ProfilEdit::class)->name('profil.edit');
        // Route::get('/show/{id}', ProfilShow::class)->name('profil.show');
    });
});


Route::middleware(['auth', 'admin'])->group(function () {
    // dashboard
    Route::get('/dashboard', DashboardIndex::class)->name('dashboard.index');

    // anggota
    Route::prefix('anggota')->group(function () {
        Route::get('/', AnggotaIndex::class)->name('anggota.index');
        Route::get('/create', AnggotaCreate::class)->name('anggota.create');
        Route::get('/verifikasi', AnggotaVerifikasi::class)->name('anggota.verifikasi');
        Route::get('/edit/{id}', AnggotaEdit::class)->name('anggota.edit');
        Route::get('/show/{id}', AnggotaShow::class)->name('anggota.show');
    });

    // kegiatan 
    Route::prefix('kegiatan')->group(function () {
        Route::get('/', KegiatanIndex::class)->name('kegiatan.index');
        Route::get('/create', KegiatanCreate::class)->name('kegiatan.create');
        Route::get('/edit/{id}', KegiatanEdit::class)->name('kegiatan.edit');
        Route::get('/show/{id}', KegiatanShow::class)->name('kegiatan.show');
    });

    // Absensi
    Route::prefix('absensi')->group(function () {
        Route::get('/', AbsensiIndex::class)->name('absensi.index');
    });

    // keuangan
    Route::prefix('keuangan')->group(function () {
        Route::get('/', KeuanganIndex::class)->name('keuangan.index');
        Route::get('/create', KeuanganCreate::class)->name('keuangan.create');
        Route::get('/edit/{id}', KeuanganEdit::class)->name('keuangan.edit');
        Route::get('/show/{id}', KeuanganShow::class)->name('keuangan.show');
    });

    // galeri 
    Route::prefix('galeri')->group(function () {
        Route::get('/', GaleriIndex::class)->name('galeri.index');
        Route::get('/create', GaleriCreate::class)->name('galeri.create');
        Route::get('/edit/{id}', GaleriEdit::class)->name('galeri.edit');
        Route::get('/show/{id}', GaleriShow::class)->name('galeri.show');
    });

    // inventaris
    Route::prefix('inventaris')->group(function () {
        Route::get('/', InventarisIndex::class)->name('inventaris.index');
        Route::get('/create', InventarisCreate::class)->name('inventaris.create');
        Route::get('/edit/{id}', InventarisEdit::class)->name('inventaris.edit');
        Route::get('/show/{id}', InventarisShow::class)->name('inventaris.show');
    });

    // berita
    Route::prefix('berita')->group(function () {
        Route::get('/', BeritaIndex::class)->name('berita.index');
        Route::get('/create', BeritaCreate::class)->name('berita.create');
        Route::get('/edit/{id}', BeritaEdit::class)->name('berita.edit');
        Route::get('/show/{id}', BeritaShow::class)->name('berita.show');
    });

    Route::prefix('berita')->group(function () {
        Route::get('/', BeritaIndex::class)->name('berita.index');
        Route::get('/create', BeritaCreate::class)->name('berita.create');
        Route::get('/edit/{id}', BeritaEdit::class)->name('berita.edit');
        Route::get('/show/{id}', BeritaShow::class)->name('berita.show');
    });
});
