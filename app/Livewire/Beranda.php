<?php

namespace App\Livewire;

use App\Models\Berita;
use App\Models\Kegiatan;
use Livewire\Component;

class Beranda extends Component
{
    public function render()
    {
        return view('livewire.beranda', [
            'berita' => Berita::paginate(6),
            'kegiatan' => Kegiatan::paginate(3)
        ]);
    }
}
