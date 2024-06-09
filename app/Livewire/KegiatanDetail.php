<?php

namespace App\Livewire;

use App\Models\Kegiatan;
use Livewire\Component;

class KegiatanDetail extends Component
{
    public Kegiatan $kegiatan;

    public function mount(Kegiatan  $kegiatan) 
    {
        $this->kegiatan = $kegiatan;
    }
    public function render()
    {
        return view('livewire.kegiatan-detail');
    }
}
