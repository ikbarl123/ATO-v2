<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'judul',
        'tahun',
        'id_penulis',
        'deskripsi',
        'gambar'
    ];
    
    public function penulis()
    {
        return $this->belongsTo(penulis::class,'id_penulis','id');
    }


}
