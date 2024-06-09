<?php

namespace App\Livewire;

use App\Models\AjuanSurat;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SuratDitolak extends Component
{
    #[Layout('components.layouts.admin.index')] 

    public function render()
    {
        return view('livewire.admin.ajuan-surat.surat-ditolak',[
            'surat_ditolak' => AjuanSurat::where('status', 'Ditolak')->paginate(10)
        ]);
    }
}
