@extends('layouts.admin')

@section('header')
Data Buku
@endsection
@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Buku
                           <div class="pull-right">
                               
                               <a href="" class="btn btn-success btn-sm "><i class="fa fa-print"></i>Export</a>
                                <a href="{{url('/admin/buku/create')}}" class="btn btn-success btn-sm "><i class="fa fa-plus"></i>ADD</a>
                            </div> 
                        </div>
                        <div class="panel-body">
                            <div class="card">
                                <div class="card-header">
                                                                
                                </div>
                                <div class="card-body table-responsive">
                                     <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Judul</th>
                                                <th class="text-center">Tahun</th>
                                                <th class="text-center">Penulis</th>
                                                <th></th>
                                                    
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($buku as $bukus)
                                             <tr>
                                                <th class="text-center col-sm-1">{{$loop->iteration}}</th>
                                                <th>{{$bukus->judul}}</th>
                                                <th class="text-center col-sm-1">{{$bukus->tahun}}</th>
                                                <th class="text-center col-sm-1">{{$bukus->penulis->nama_penulis}}</th>
                                                <th class="text-center col-sm-1" >
                                                    <a href="{{'buku/'.$bukus->id.'/edit'}}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <form action="{{url('admin/buku/'.$bukus->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i></button>
                                                    </th>
                                                </form>

                                            </tr>   
                                            @endforeach
                                            
                                        </tbody>
                                        {{ $buku->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
@endsection