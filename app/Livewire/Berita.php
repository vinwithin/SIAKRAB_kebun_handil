<?php

namespace App\Livewire;

use App\Models\Berita as ModelsBerita;
use Livewire\Component;

class Berita extends Component
{
    
    public function render()
    {
        return view('livewire.berita', [
            'berita' => ModelsBerita::paginate(10)
        ]);
    }
   
}
