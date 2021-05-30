<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penulis extends Model
{
    use HasFactory;
    public $timestamps = false; 
    protected $fillable = [
        'nama_penulis'   
    ];
   public function list_buku() 
 {   
   return $this->hasMany(buku::class);
}
    


}
