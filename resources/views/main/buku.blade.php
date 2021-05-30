@extends('layouts.app')


@section('content')

<div class="container">
    <h4>Katalog Buku
       <hr>
       <br>
    <div class="row justify-content-center">
   
    @foreach ($buku as $bukus)
        <div class="col-md-4">
    <div class="card" style="width: 18rem;">
  
    @if(is_Null($bukus->gambar))
    <img class="card-img-top" src="{{asset("storage/images/gambar/missing.jpg")}}" alt="Card image cap">
    @else
    <img class="card-img-top" src="{{asset("storage/".$bukus->gambar)}}" alt="Card image cap">
    @endif

  <div class="card-body">
    <h2 class="card-title font-weight-bold">{{$bukus->judul}}</h2>
    <h5 class="card-text">{{$bukus->tahun}}</h5>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Penulis : {{$bukus->penulis->nama_penulis}}</li>
    <li class="list-group-item">{{$bukus->deskripsi}}</li>
  </ul>
</div>
</div>
    @endforeach

    
    

</div>
<br>
{{ $buku->links() }}
<div class="container">
    
</div>


    </div>
</div>
@endsection