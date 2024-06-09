<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjuanSurat extends Model
{
    use HasFactory;
    protected $table = 'ajuan_surat';
    public $ajuan_surat = 'ajuan_surat';
    protected $fillable = [  
        'nama_pengaju',
        'NIK',
        'NoWa',
        'Alamat',
        'kategori_surat_id',
        'KTP',
        'PBB',
        'KK',
        'surat_pengantar_rt',
        'status'
    ];
    public function kategori_surat(){
        return $this->belongsTo(Kategori_surat::class);
    }
}
