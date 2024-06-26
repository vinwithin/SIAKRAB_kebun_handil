<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $table = 'kegiatan';
    public $berita = 'kegiatan';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'image_kegiatan',
        'body',
    ];
   
    public function admin(){
        return $this->belongsTo(User::class);
    }
}
