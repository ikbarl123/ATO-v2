@extends('layouts.admin')

@section('header')
Data Penulis
@endsection
@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           penulis
                           <div class="pull-right">
                               
                               <a href="" class="btn btn-success btn-sm "><i class="fa fa-print"></i>Export</a>
                                <a href="{{url('/admin/penulis/create')}}" class="btn btn-success btn-sm "><i class="fa fa-plus"></i>ADD</a>
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
                                                <th class="text-center">Nama</th>                                                
                                                <th></th>
                                                    
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($penulis as $penulis)
                                             <tr>
                                                <th class="text-center col-sm-1">{{$loop->iteration}}</th>
                                                <th>{{$penulis->nama_penulis}}</th>                                                
                                                <th class="text-center col-sm-1" >
                                                    <a href="{{'penulis/'.$penulis->id.'/edit'}}" class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                <form action="{{url('admin/penulis/'.$penulis->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Yakin?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i></button>
                                                    </th>
                                                </form>

                                            </tr>   
                                            @endforeach
                                            
                                        </tbody>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>           
            </div>
@endsection