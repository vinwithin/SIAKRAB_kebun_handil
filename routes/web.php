<?php

use App\Livewire\Beranda;
use App\Livewire\VisiMisi;
use Illuminate\Support\Facades\Route;



Route::get('/', Beranda::class);
Route::get('/visi-dan-misi', VisiMisi::class);