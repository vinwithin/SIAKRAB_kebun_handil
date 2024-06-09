<?php

namespace App\Livewire;

use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;


class EditKegiatan extends Component
{
    use WithFileUploads;

    #[Layout('components.layouts.admin.index')] 
    public $id;
    public $title;
    public $body;
    public $image_kegiatan;

    public function mount(Kegiatan $kegiatan) 
    {
        $this->id = $kegiatan->id;
        $this->title = $kegiatan->title;
        $this->body = $kegiatan->body;
        // dd($this->body);
        
    }

    public function render()
    {
        return view('livewire.admin.kegiatan.edit-kegiatan');
    }

    public function save(){
        $validateData = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'image_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            
        ]);
        $validateData["slug"] = Str::slug($this->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($this->body), 300);
        $imageName = time() . '_' . $this->image_kegiatan->getClientOriginalName();
        $validateData['image_kegiatan'] = $imageName;

        $result = Kegiatan::where('id', $this->id)
                  ->update($validateData);
        if ($result) {
            $this->image_kegiatan->storeAs('public/kegiatan', $imageName);
            return redirect('/admin/kegiatan')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/kegiatan/edit-kegiatan')->with("error", "Gagal mengubah data!");
        }
        
    }
    public function destroy(Kegiatan $kegiatan){
        Kegiatan::where('id', $kegiatan->id)->delete(); 
        return redirect('/admin/kegiatan')->with('success', 'Berita Berhasil Dihapus!');
    }
}
