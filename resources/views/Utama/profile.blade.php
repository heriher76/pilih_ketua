@extends('layouts.master')

@section('title','Informasi Bakal Calon')

@section('nav')
@include('partials._nav')
@endsection

@section('main')
<div class="main m-profile" style="height: 100%;">
  <div class="mx-auto title" style="width: auto;">
      <center><p>Bakal Calon</p></center>
  </div>
  <br><br>
	<div class="row p-rt">
      @foreach($calons as $key => $calon)
        @if ($key+1 % 2 !== 0)
  		  <div class="col-3" style="text-align: center; margin-bottom: 15px">
        		<img src="{{url('calon/'.$calon->foto)}}" class="mx-auto d-block  rounded-circle" width="200px" height="200px">
            <h2>{{$calon->nama}}</h2> 
            <a href="{{ url('/info/calon/'.$calon->id) }}"><button type="button"  class="btn btn-dark lihat">Lihat Profil</button></a>
        </div>
        @else if($key+1 % 2 === 0)
        <div class="col-3" style="text-align: center; margin-bottom: 15px">
        		<img src="{{url('calon/'.$calon->foto)}}" class="mx-auto d-block  rounded-circle" width="200px" height="200px">
            <h2 >{{$calon->nama}}</h2>
            <a href="{{ url('/info/calon/'.$calon->id) }}"><button type="button"  class="btn btn-dark lihat">Lihat Profil</button></a>
        </div>
        @endif
      @endforeach
	</div>

</div>
@endsection





@section('script')

@endsection