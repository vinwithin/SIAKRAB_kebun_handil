<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;

class Struktur extends Component
{
    public function render()
    {
        return view('livewire.struktur',[
            'berita' => Berita::all()
        ]);
    }
}
