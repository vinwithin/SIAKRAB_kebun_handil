<?php

namespace App\Livewire;

// use App\Models\Aduan;

use App\Models\Aduan as ModelsAduan;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Aduan extends Component
{
    #[Layout('components.layouts.admin.index')] 

    
    // public $idAduan;
   
    // public function mount($id) 
    // {
    //     $aduan = ModelsAduan::find($id);
    //     $this->idAduan = $aduan->id;
    //     dd($this->idAduan);

    // }
    public function render()
    {
        return view('livewire.admin.aduan.aduan',[
            'aduan' => ModelsAduan::paginate(10)
        ]);
    }

    public function destroy($id){
        ModelsAduan::where('id', $id )->delete(); 
        return redirect('/admin/berita')->with('success', 'Berita Berhasil Dihapus!');
    }
}
