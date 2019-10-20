@extends('layouts.master')

@section('title','Home')

@section('nav')
  @include('partials._nav')
@endsection

@section('main')
<div class="main" style="height: 100%;">
  <form action="{{ route('submit_pilihan') }}" method="post">
  {{csrf_field()}}
  <div class="rt" >
    <div class="mx-auto title" style="width: auto;">
      <center><p>Pemilihan <span style="background-color: white; padding: 5px;">Ketua Umum </span></p></center>
    </div>
    <br>

    <div class="row">
      @foreach($calons as $key => $calon)
      @if ($key+1 % 2 !== 0)
      <div class="col-5 offset-1"  style="text-align: center;">
        <img src="{{url('calon/'.$calon->foto)}} " class="mx-auto d-block  rounded-circle" width="200px" height="200px">
        <a href="{{ url('info/calon/'.$calon->id) }}" style="color: black;"><h2>{{$calon->nama}}</h2></a>
        <h6 >"{{$calon->visi}}"</h6>
        <label class="btn btn-dark pilih" for="id">Pilih <input type="radio" hidden=""  name="id_calon" value="{{ $calon->id }}" id="id"></label>
      </div>
      @endif

      @if ($key+1 % 2 === 0)
      <div class="col-5" style="text-align: center;">
        <img src="{{url('calon/'.$calon->foto)}} " class="mx-auto d-block  rounded-circle" width="200px" height="200px">
        <h2>{{$calon->nama}}</h2>
        <h6 >"{{$calon->visi}}"</h6>
        <label class="btn btn-dark pilih" for="id">Pilih <input type="radio" hidden=""  name="id_calon" value="{{ $calon->id }}" id="id"></label>
      </div>
      @endif
      @endforeach
    </div>  
    <br><br>
    <div class="row">
      <div class="col-4 offset-4"style="text-align: center;">
      <button type="submit"  style="text-align: center;" class="btn btn-success selesai" id="selesai">Selesai</button>
     </div>
    </div>
    <br>

  </div>

   </form>
</div>
@endsection

@section('script')
 
@endsection
