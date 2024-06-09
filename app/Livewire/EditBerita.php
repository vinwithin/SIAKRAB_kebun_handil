<?php

namespace App\Livewire;

use App\Models\Berita;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Livewire\Component;

class EditBerita extends Component
{
    use WithFileUploads;
    #[Layout('components.layouts.admin.index')] 
    // public Berita $berita;
    public $id;
    public $title;
    public $body;
    public $image_berita;
    
    public function mount(Berita $berita) 
    {
        $this->id = $berita->id;
        $this->title = $berita->title;
        $this->body = $berita->body;
        // dd($this->body);
        
    }
    public function render(Berita $berita)
    {
        return view('livewire.admin.berita.edit-berita');
    }
    
    public function save(){
        $validateData = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'image_berita' => 'required|image|mimes:png,jpg,jpeg|max:2024',
            
        ]);
        $validateData["slug"] = Str::slug($this->title, '-');
        $validateData["excerpt"] =  Str::limit(strip_tags($this->body), 300);
        $imageName = time() . '_' . $this->image_berita->getClientOriginalName();
        $validateData['image_berita'] = $imageName;

        $result = Berita::where('id', $this->id)
                  ->update($validateData);
        if ($result) {
            $this->image_berita->storeAs('public', $imageName);
            return redirect('/admin/berita')->with('success', 'berhasil mengubah data');
        } else {
            return redirect('/admin/berita/edit-berita')->with("error", "Gagal mengubah data!");
        }
        
    }
    public function destroy(Berita $berita){
        Berita::where('id', $berita->id)->delete(); 
        return redirect('/admin/berita')->with('success', 'Berita Berhasil Dihapus!');
    }
}
