<?php

namespace App\Http\Controllers;

use App\Models\penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
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
        $penulis = penulis::all();
        return view('admin.penulis',compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tambah-penulis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        penulis::create([
            'nama_penulis'=>$request->nama]
            );
        
       
        
        return redirect('admin/penulis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function show(penulis $penulis)
    {
        return $penulis;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function edit(penulis $penulis)
    {
        return view('admin.edit-penulis',compact('penulis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, penulis $penulis)
    {
         penulis::where('id',$penulis->id)
        ->update(['nama_penulis'=>$request->nama]);
            return redirect('admin/penulis');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\penulis  $penulis
     * @return \Illuminate\Http\Response
     */
    public function destroy(penulis $penulis)
    {
        $penulis->delete();
        return redirect('admin/penulis');  
    }
}
