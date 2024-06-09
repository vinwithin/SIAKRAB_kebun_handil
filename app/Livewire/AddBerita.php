<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Exception;
use Illuminate\Http\Request;

#[Layout('components.layouts.admin.index')] 

class AddBerita extends Component
{
    public $title;
    public $body;
    public $image_berita;
    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.berita.add-berita');
    }

    public function save(Request $request){
        // try{
        $validateData = $this->validate(
            [
                'title' => 'required',
                'body' => 'required',
                'image_berita' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                
            ]
        );
        $validateData["user_id"] = auth()->user()->id;
        $validateData['slug'] = 'require|unique:berita';
        $validateData["slug"] = Str::slug($this->title, '-');
        $validateData["excerpt"] = Str::limit(strip_tags($this->body), 300);
        $image_name = time() . '_' . $this->image_berita->getClientOriginalName();
        // $this->image_berita->storeAs('public/media/berita/thumbnails', $image_name);
        $validateData['image_berita'] = $image_name;

        $result = Berita::create($validateData);
        
        $this->image_berita->storeAs('public', $image_name);
        if ($result) {
            return redirect('/admin/berita')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('admin/berita/tambah-berita')->with("error", "Gagal menambahkan data!");
        }
        
        // }catch (Exception $e){
        //     return redirect()->to('berita')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        // }
    }
    
}
