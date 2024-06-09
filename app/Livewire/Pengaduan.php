<?php

namespace App\Livewire;

use App\Models\Aduan;
use App\Models\AjuanSurat;
use Livewire\Component;
use Livewire\WithFileUploads;


class Pengaduan extends Component
{
    public $nama_pelapor;
    public $noWa;
    public $Lokasi;
    public $foto_bukti;
    public $detail;
    use WithFileUploads;


    public function render()
    {
        return view('livewire.guest.pengaduan');
    }

    public function save(){
        $validateData = $this->validate(
            [
                'nama_pelapor' => 'required',
                'noWa' => 'required',
                'Lokasi' => 'required',
                'foto_bukti' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'detail' => 'required',
            ]
        );
        $image_name = time() . '_' . $this->foto_bukti->getClientOriginalName();
        // $this->image_berita->storeAs('public/media/berita/thumbnails', $image_name);
        $validateData['foto_bukti'] = $image_name;
        
        $this->foto_bukti->storeAs('/public/aduan', $image_name);

        $result = Aduan::create($validateData);
    
        if ($result) {
            return redirect('/pengaduan')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/pengaduan')->with("error", "Gagal menambahkan data!");
        }
    }
}
