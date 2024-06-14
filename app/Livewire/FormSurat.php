<?php

namespace App\Livewire;

use App\Models\AjuanSurat;
use App\Models\Kategori_surat;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormSurat extends Component
{
    use WithFileUploads;
    public $nama_pengaju;
    public $NIK;
    public $NoWa;
    public $ttl;
    public $jenis_kelamin;
    public $agama;
    public $pekerjaan;
    public $Alamat;
    public $kategori_surat_id;
    public $KTP;
    public $PBB;
    public $KK;
    public $surat_pengantar_rt;

    public function render()
    {
        return view('livewire.guest.form-surat',[
            'kategori' => Kategori_surat::all()
        ]);
    }
    public function save(){
        $validateData = $this->validate(
            [
                'nama_pengaju' => 'required',
                'NIK' => 'required',
                'NoWa' => 'required',
                'ttl' => 'required',
                'jenis_kelamin' => 'required',
                'agama' => 'required',
                'pekerjaan' => 'required',
                'Alamat' => 'required',
                'kategori_surat_id' => '',
                'KTP' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'PBB' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'KK' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                'surat_pengantar_rt' => 'required|image|mimes:png,jpg,jpeg|max:2024',
                
            ]
        );
        $validateData['status'] = "Belum Diverifikasi";
        $image_ktp = time() . '_' . $this->KTP->getClientOriginalName();
        $image_pbb = time() . '_' . $this->PBB->getClientOriginalName();
        $image_kk = time() . '_' . $this->KK->getClientOriginalName();
        $image_surat_pengantar_rt = time() . '_' . $this->surat_pengantar_rt->getClientOriginalName();

        $validateData['KTP'] = $image_ktp;
        $validateData['PBB'] = $image_pbb;
        $validateData['KK'] = $image_kk;
        $validateData['surat_pengantar_rt'] = $image_surat_pengantar_rt;

        $this->KTP->storeAs('/public/surat/ktp', $image_ktp);
        $this->PBB->storeAs('/public/surat/pbb', $image_pbb);
        $this->KK->storeAs('/public/surat/kk', $image_kk);
        $this->surat_pengantar_rt->storeAs('/public/surat/surat_pengantar_rt', $image_surat_pengantar_rt);

        $result = AjuanSurat::create($validateData);
    
        if ($result) {
            return redirect('/surat')->with('success', 'berhasil menambahkan data');
        } else {
            return redirect('/surat')->with("error", "Gagal menambahkan data!");
        }
    }
}
