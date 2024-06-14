<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;

class VisiMisi extends Component
{
    public function render()
    {
        return view('livewire.visi-misi',[
            'berita' => Berita::all()
        ]);
    }
}
