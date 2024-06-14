<?php

namespace App\Livewire;

use App\Models\AjuanSurat;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SuratDitolak extends Component
{
    #[Layout('components.layouts.admin.index')] 
    public $actionId;

    public function render()
    {
        return view('livewire.admin.ajuan-surat.surat-ditolak',[
            'surat_ditolak' => AjuanSurat::where('status', 'Ditolak')->paginate(10)
        ]);
    }
    public function approve($id){
        $this->actionId = $id;
        $result = AjuanSurat::where('id', $this->actionId)
                  ->update(['status' => 'Diterima']);
        if ($result) {
            return redirect('/admin/surat/diterima')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/surat/ditolak')->with("error", "Gagal mengubah data!");
        }
    }
    public function destroy($id){
        AjuanSurat::where('id', $id )->delete(); 
        return redirect('/admin/surat')->with('success', 'Aduan Berhasil Dihapus!');
    }
}
