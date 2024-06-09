<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowBerita extends Component
{
    #[Layout('components.layouts.admin.index')] 

    public function render()
    {
        return view('livewire.admin.berita.show-berita', [
            'berita' => Berita::paginate(10),
        ]);
    }
}
