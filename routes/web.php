<?php

use App\Livewire\Beranda;
use App\Livewire\Berita;
use App\Livewire\Dashboard;
use App\Livewire\FormSurat;
use App\Livewire\LayananSurat;
use App\Livewire\Pengaduan;
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
Route::get('/admin', Dashboard::class);