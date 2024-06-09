<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailBerita extends Component
{
    #[Layout('components.layouts.admin.index')] 
    public Berita $berita;

    public function mount(Berita $berita) 
    {
        $this->berita = $berita;
    }
    public function render()
    {
        return view('livewire.admin.berita.detail-berita');
    }
}
