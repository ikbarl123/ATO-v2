@extends('layouts.admin')

@section('header')
Tambah Data  
@endsection
@section('content')
 <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Buku
                        </div>
                        <div class="panel-body">
                            <div class="row justify-content-center ">
                                <div class="col-md-12">
                                    <form role="form" action="{{url('admin/buku/'.$buku->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input class="form-control" name="judul" value="{{$buku->judul}}" autofocus required></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun</label>
                                            <input class="form-control" name="tahun" value="{{$buku->tahun}}"></input>
                                        </div>
                                        <div class="form-group">
                                            <label>Penulis</label>
                                            <select class="form-control" name="id_penulis">
                                                <option value=""> - Pilih Penulis</option>
                                                @foreach ($penulis as $penulis)
                                                    <option value="{{$penulis->id}}"{{old('id_penulis',$buku->id_penulis)==$penulis->id ?'selected': null}}> {{$penulis->nama_penulis}}</option>
                                                @endforeach
                                            </select>
                                        </div> 
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsi"  rows="3">{{$buku->deskripsi}}</textarea>
                                        </div>
                                        
                                        <br>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
@endsection
