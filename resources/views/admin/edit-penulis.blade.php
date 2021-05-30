@extends('layouts.admin')

@section('header')
Tambah Data  
@endsection
@section('content')
 <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah penulis
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <form role="form" action="{{url('admin/penulis/'.$penulis->id)}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group">
                                            <label>Nama Penulis</label>
                                            <input class="form-control" name="nama" value="{{$penulis->nama_penulis}}"  autofocus required>
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
