<?php

use App\Livewire\AddBerita;
use App\Livewire\AddKegiatan;
use App\Livewire\Aduan;
use App\Livewire\AjuanSurat;
use App\Livewire\Beranda;
use App\Livewire\Berita;
use App\Livewire\BeritaDetail;
use App\Livewire\Dashboard;
use App\Livewire\DetailBerita;
use App\Livewire\DetailKegiatan;
use App\Livewire\EditBerita;
use App\Livewire\EditKegiatan;
use App\Livewire\FormSurat;
use App\Livewire\KegiatanDetail;
use App\Livewire\LayananSurat;
use App\Livewire\Login;
use App\Livewire\Pengaduan;
use App\Livewire\ShowBerita;
use App\Livewire\ShowKegiatan;
use App\Livewire\Struktur;
use App\Livewire\SuratDiterima;
use App\Livewire\SuratDitolak;
use App\Livewire\SyaratSurat;
use App\Livewire\VisiMisi;
use Illuminate\Support\Facades\Route;



Route::get('/', Beranda::class);
Route::get('/visi-dan-misi', VisiMisi::class);
Route::get('/struktur-organisasi', Struktur::class);
Route::get('/berita', Berita::class);
Route::get('/berita/detail/{berita:slug}', BeritaDetail::class);
Route::get('/kegiatan/detail/{kegiatan:slug}', KegiatanDetail::class);

Route::get('/layanan-surat', LayananSurat::class);
Route::get('/syarat-surat', SyaratSurat::class);
Route::get('/surat', FormSurat::class);
Route::get('/pengaduan', Pengaduan::class);

Route::middleware('auth')->prefix('admin')->group(function(){
    Route::get('/dashboard', Dashboard::class)->middleware('auth');
    Route::get('/berita', ShowBerita::class);
    Route::get('/aduan', Aduan::class);
    Route::get('/surat', AjuanSurat::class);
    Route::get('/surat/diterima', SuratDiterima::class);
    Route::get('/surat/ditolak', SuratDitolak::class);
    
    Route::get('/aduan/delete/{id}', [Aduan::class, 'destroy']);
    Route::get('/berita/tambah-berita', AddBerita::class);
    Route::post('/berita/tambah-berita', AddBerita::class);
    Route::get('/berita/edit-berita/{berita:slug}', EditBerita::class);
    Route::get('/berita/detail/{berita:slug}', DetailBerita::class);
    Route::get('/berita/delete/{berita:slug}', [EditBerita::class, 'destroy']);
    Route::get('/kegiatan', ShowKegiatan::class);
    Route::get('/kegiatan/tambah-kegiatan', AddKegiatan::class);
    Route::get('/kegiatan/edit-kegiatan/{kegiatan:slug}', EditKegiatan::class);
    Route::get('/kegiatan/detail/{kegiatan:slug}', DetailKegiatan::class);
    Route::get('/kegiatan/delete/{kegiatan:slug}', [EditKegiatan::class, 'destroy']);
    Route::get('/logout', [Login::class, 'logout']);
});

Route::get('/login', Login::class)->name('login')->middleware('guest');

Route::post('/login', Login::class);

