<?php

use App\Livewire\Beranda;
use App\Livewire\Berita;
use App\Livewire\Dashboard;
use App\Livewire\FormSurat;
use App\Livewire\LayananSurat;
use App\Livewire\Login;
use App\Livewire\Pengaduan;
use App\Livewire\ShowBerita;
use App\Livewire\ShowKegiatan;
use App\Livewire\Struktur;
use App\Livewire\SyaratSurat;
use App\Livewire\VisiMisi;
use Illuminate\Support\Facades\Route;



Route::get('/', Beranda::class);
Route::get('/visi-dan-misi', VisiMisi::class);
Route::get('/struktur-organisasi', Struktur::class);
Route::get('/berita', Berita::class);
Route::get('/layanan-surat', LayananSurat::class);
Route::get('/syarat-surat', SyaratSurat::class);
Route::get('/surat', FormSurat::class);
Route::get('/pengaduan', Pengaduan::class);

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/dashboard', Dashboard::class)->middleware('auth');
    Route::get('/berita', ShowBerita::class);
    Route::get('/kegiatan', ShowKegiatan::class);
    Route::get('/logout', [Login::class, 'logout']);
});

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::post('/login', Login::class);

