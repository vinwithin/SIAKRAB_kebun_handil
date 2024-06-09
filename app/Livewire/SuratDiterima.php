<?php

namespace App\Livewire;

use App\Models\AjuanSurat;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SuratDiterima extends Component
{
    #[Layout('components.layouts.admin.index')] 

    public function render()
    {
        return view('livewire.admin.ajuan-surat.surat-diterima', [
            'surat_diterima' => AjuanSurat::where('status', 'Diterima')->paginate(10)
        ]);
    }
}
