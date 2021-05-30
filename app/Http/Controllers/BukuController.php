<?php

namespace App\Http\Controllers;

use App\Models\buku;
use App\Models\penulis;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $buku = buku::with('penulis')->simplePaginate(8);
        return view('admin.buku',compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penulis = penulis::all();
        return view('admin.tambah-buku',compact('penulis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
        'judul' => 'required|max:255',
        'tahun' => 'integer|min:1000|max:4000',
        'gambar' => 'image|max:4096'
            ]);
        $gambar = request()->file('gambar');
        $urlgambar = $gambar->storeAs("images/gambar","{$request->judul}.{$request->gambar->extension()}");
        
        buku::create([
            'judul'=>$request->judul,
            'tahun'=>$request->tahun,
            'id_penulis'=>$request->id_penulis,
            'gambar'=>$urlgambar,
            'deskripsi'=>$request->deskripsi
            ]);
        
       
        return redirect('admin/buku');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
        return $buku;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit(buku $buku)
    {
        $penulis = penulis::all();
        return view('admin.edit-buku',compact('buku','penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, buku $buku)
    {
        $request->validate([
        'judul' => 'required|max:255',
        'tahun' => 'integer|min:1000|max:4000',]);

        
        buku::where('id',$buku->id)
        ->update(['judul'=>$request->judul,
            'tahun'=>$request->tahun,
            'deskripsi'=>$request->deskripsi]);
            return redirect('admin/buku');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy(buku $buku)
    {
        $gambar=$buku->gambar;
         unlink(storage_path('app/public/'."$gambar"));
         $buku->delete();
        
         return redirect('admin/buku');
 
    }
}
