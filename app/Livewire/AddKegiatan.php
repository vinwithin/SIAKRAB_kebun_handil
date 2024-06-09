<?php

namespace App\Livewire;

use App\Models\Kegiatan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AddKegiatan extends Component
{
    public $title;
    public $body;
    public $image_kegiatan;
    use WithFileUploads;
    #[Layout('components.layouts.admin.index')] 

    public function render()
    {
        return view('livewire.admin.kegiatan.add-kegiatan',[
            'kegiatan' => Kegiatan::all()
        ]);
      
    }
    public function store(){
        // dd('asu');
        // try{
        $validateData = $this->validate(
            [
                'title' => 'required',
                'body' => 'required|min:5',
                'image_kegiatan' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                
            ]
        );
        $validateData["user_id"] = auth()->user()->id;
        $validateData['slug'] = 'require|unique:berita';
        $validateData["slug"] = Str::slug($this->title, '-');
        $validateData["excerpt"] = Str::limit(strip_tags($this->body), 300);
        $image_name = time() . '_' . $this->image_kegiatan->getClientOriginalName();
        $validateData['image_kegiatan'] = $image_name;

        $result = Kegiatan::create($validateData);
        

        if ($result) {
            $this->image_kegiatan->storeAs('public/kegiatan', $image_name);
            return redirect('/admin/kegiatan')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('admin/berita/tambah-kegiatan')->with("error", "Gagal menambahkan data!");
        }
        // }catch (Exception $e){
        //     return redirect()->to('berita')->with("slugerror", "Gagal menambahkan data! masukkan judul yang lain!");
        // }
    }
}
