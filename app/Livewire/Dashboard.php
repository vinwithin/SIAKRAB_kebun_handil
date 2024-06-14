<?php

namespace App\Livewire;

use App\Models\Aduan;
use App\Models\AjuanSurat;
use App\Models\Berita;
use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.admin.index')] 
    public function render()
    {
        return view('livewire.admin.dashboard',[
            'berita' => Berita::all(),
            'kegiatan' => Kegiatan::all(),
            'ajuan_surat' => AjuanSurat::all(),
            'aduan' => Aduan::all()
        ]);
    }
}
