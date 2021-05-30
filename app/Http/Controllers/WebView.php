<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\penulis;
use Illuminate\Http\Request;

class WebView extends Controller
{
    public function index()
    {
     return view('main.index');
    }
    public function buku()
    {
      $buku = buku::with('penulis')->simplePaginate(8);
     return view('main.buku',compact('buku'));
    }
}
