<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;

class BeritaDetail extends Component
{
    public Berita $berita;

    public function mount(Berita $berita) 
    {
        $this->berita = $berita;
    }
    public function render()
    {
        return view('livewire.berita-detail');
    }
}
