<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $table = 'berita';
    public $berita = 'berita';
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'excerpt',
        'image_berita',
        'body',
    ];
   
    public function admin(){
        return $this->belongsTo(User::class);
    }
}
