<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_surat extends Model
{
    use HasFactory;
    protected $table = 'kategori_surat';
    public $kategori_surat = 'kategori_surat';

    public function ajuan_surat(){
        return $this->hasMany(AjuanSurat::class);
    }
}
