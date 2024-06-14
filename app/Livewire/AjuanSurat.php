<?php

namespace App\Livewire;


use App\Models\AjuanSurat as ModelsAjuanSurat;
use Livewire\Attributes\Layout;
use Livewire\Component;
use PhpOffice\PhpWord\PhpWord;
use Livewire\WithFileUploads;

class AjuanSurat extends Component
{
    use WithFileUploads;
    public $actionId;

    #[Layout('components.layouts.admin.index')] 
    public function render()
    {
        return view('livewire.admin.ajuan-surat.ajuan-surat',[
            'ajuan_surat' => ModelsAjuanSurat::where('status', 'Belum Diverifikasi')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function approve($id){
        $this->actionId = $id;
        $result = ModelsAjuanSurat::where('id', $this->actionId)
                  ->update(['status' => 'Diterima']);
        if ($result) {
            return redirect('/admin/surat/diterima')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/surat')->with("error", "Gagal mengubah data!");
        }
    }
    public function reject($id){
        $this->actionId = $id;
        $result = ModelsAjuanSurat::where('id', $this->actionId)
                  ->update(['status' => 'Ditolak']);
        if ($result) {
            return redirect('/admin/surat')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/surat')->with("error", "Gagal mengubah data!");
        }
    }
    public function destroy($id){
        ModelsAjuanSurat::where('id', $id )->delete(); 
        return redirect('/admin/surat/')->with('success', 'Aduan Berhasil Dihapus!');
    }

    
}
