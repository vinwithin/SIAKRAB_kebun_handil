<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowBerita extends Component
{
    #[Layout('components.layouts.admin.index')] 
    public $cari;

    public function render()
    {
        return view('livewire.admin.berita.show-berita', [
            'berita' => $this->cari === null ?
                    Berita::paginate(10) :
                    Berita::where('name', 'like', '%' . $this->cari . '%')->latest()->paginate(10),
            
        ]);
    }
    
    
}
