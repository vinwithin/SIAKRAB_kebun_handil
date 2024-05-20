<?php

use App\Livewire\Beranda;
use App\Livewire\Berita;
use App\Livewire\LayananSurat;
use App\Livewire\Struktur;
use App\Livewire\VisiMisi;
use Illuminate\Support\Facades\Route;



Route::get('/', Beranda::class);
Route::get('/visi-dan-misi', VisiMisi::class);
Route::get('/struktur-organisasi', Struktur::class);
Route::get('/berita', Berita::class);
Route::get('/layanan-surat', LayananSurat::class);