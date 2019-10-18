@extends('layouts.master')

@section('title','Home')

@section('nav')
@include('partials._nav')
@endsection

@section('main')
<div class="main ">
  <form action="/home/logout?id={{ $_GET['id'] }}" method="post">
  <div class="rt" >
    <div class="mx-auto title" style="width: 330px;">
      <p>Pemilihan <span class="RT" style="background-color: white">RT {{$daerah->rt}}</span></p>
    </div>
    <br>

  
    <div class="row">
       @foreach($suara as $item)
    <?php   if ($item->calon == "rt" ) : ?>
      <?php  if ($loop->iteration%2==1) : ?>
  
      <div class="col-5 offset-1"  style="text-align: center;">

        <img src="{{url('calon/300/'.$item->getCalon->foto)}} " class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
          
         <h2>{{$item->getCalon->nama}}</h2>
          <h6 >"{{$item->getCalon->visi}}"</h6>
           <label class="btn btn-dark pilih" for="{{$item->id}}">Pilih <input type="radio" hidden=""  name="rt" value="{{$item->id}}" id="{{$item->id}}"></label>
      </div>
      </div>
     <?php   endif; ?>
     <?php  if ($loop->iteration%2==0) : ?>

      <div class="col-5" style="text-align: center;">
      <img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
          
         <h2>{{$item->getCalon->nama}}</h2>
          <h6 >"{{$item->getCalon->visi}}"</h6>
            <label class="btn btn-dark pilih" for="{{$item->id}}">Pilih <input type="radio" hidden=""  name="rt" value="{{$item->id}}" id="{{$item->id}}"></label>
      </div>
          <?php   endif; ?>
    <?php   endif; ?>
      @endforeach
 

    </div>

    <div class="row">
      <div class="col-12"style="text-align: center;">
     <button type="button"  style="text-align: center;" class="btn btn-success lanjut">Selanjutnya</button>
     </div>
    </div>

  </div>
  <div class="rw">
    <div class="mx-auto title" style="width: 330px;">
      <p>Pemilihan <span class="RT" style="background-color: white">RW {{$daerah->rw}}</span></p>
    </div>
    <br>

  
    <div class="row">
   @foreach($suara as $item)
    <?php   if ($item->calon == "rw" ) : ?>
      <?php  if ($loop->iteration%2==1) : ?>
      <div class="col-5 offset-1"  style="text-align: center;">

        <img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
         <h2>{{$item->getCalon->nama}}</h2>
          <h6 >"{{$item->getCalon->visi}}"</h6>
          <label class="btn btn-dark pilih" for="{{$item->id}}">Pilih <input type="radio" hidden=""  name="rw" value="{{$item->id}}" 
            id="{{$item->id}}"></label>
      </div>
      </div>
       <?php   endif; ?>
    <?php  if ($loop->iteration%2==0) : ?>


      <div class="col-5" style="text-align: center;">
      <img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
         <h2>{{$item->getCalon->nama}}</h2>
          <h6 >"{{$item->getCalon->visi}}"</h6>
           <label class="btn btn-dark pilih" for="{{$item->id}}">Pilih <input type="radio" hidden=""  name="rw" value="{{$item->id}}" id="{{$item->id}}"></label>
      </div
      </div>
       <?php   endif; ?>
    <?php   endif; ?>
      @endforeach
 
    </div>

    <div class="row">
      <div class="col-4 offset-4"style="text-align: center;">
     <button type="button"  style="text-align: center;" class="btn btn-success selesai" id="selesai">Selesai</button>
     </div>
    </div>

  </div>
 

  <div class="thank hilang">
    <p>Terima Kasih Atas Partisipasinya</p>
   <button type="submit"  style="text-align: center;" class="btn btn-success selesai" id="keluar">Keluar</button>

  </div>
   {{csrf_field()}}
   </form>
</div>
@endsection

@section('script')
 
@endsection
