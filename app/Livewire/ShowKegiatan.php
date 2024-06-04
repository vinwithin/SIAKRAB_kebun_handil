<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowKegiatan extends Component
{
    #[Layout('components.layouts.admin.index')] 

    public function render()
    {
        return view('livewire.admin.show-kegiatan');
    }
}
