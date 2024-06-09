<?php

namespace App\Livewire;

use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DetailKegiatan extends Component
{
    public Kegiatan $kegiatan;

    #[Layout('components.layouts.admin.index')] 

    public function mount(Kegiatan $kegiatan) 
    {
        $this->kegiatan = $kegiatan;
    }

    public function render()
    {
        return view('livewire.admin.kegiatan.detail-kegiatan');
    }
}
