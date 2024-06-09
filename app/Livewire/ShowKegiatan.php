<?php

namespace App\Livewire;

use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowKegiatan extends Component
{
    #[Layout('components.layouts.admin.index')] 

    public function render()
    {
        return view('livewire.admin.kegiatan.show-kegiatan',[
            'kegiatan' => Kegiatan::paginate(10),
        ]);
    }
}
