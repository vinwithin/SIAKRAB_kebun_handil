<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;
    protected $table = 'aduan';
    public $aduan = 'aduan';
    protected $fillable = [  
        'nama_pelapor',
        'noWa',
        'Lokasi',
        'detail',
        'foto_bukti',
    ];
}
