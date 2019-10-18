@extends('layouts.master')

@section('title','Profile')

@section('nav')
@include('partials._nav')
@endsection

@section('main')
<div class="main m-profile">
	<div class="row" style="display: block;">
		<div class="col-3">
			<button type="button"  style="position: absolute; background-color: white;color: black;z-index: 2"   class="btn btn-rt btn-dark pilih">RT</button><button type="button" style="position:  absolute;left: 100px;z-index: 1" class="btn btn-rw btn-dark pilih">RW</button><br><br><br><br><br>
		</div>
	</div>
	<div class="row p-rt">
    @foreach($suara as $item)
    <?php   if ($item->calon == "rt" ) : ?>
      <?php  if ($loop->iteration==1 || $loop->iteration==3) : ?>
		  <div class="col-5 offset-1" style="text-align: center;">
      		<img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
          <h2 >{{$item->getCalon->nama}}</h2>
          <a href="/profile/calon/{{$item->id_calon}}"><button type="button"  class="btn btn-dark lihat">Lihat Profil</button></a>
      </div>
    <?php   endif; ?>
    <?php  if ($loop->iteration==2 || $loop->iteration==4) : ?>
      <div class="col-5" style="text-align: center;">
      		<img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
          <h2 >{{$item->getCalon->nama}}</h2>
           <a href="/profile/calon/{{$item->id_calon}}"><button type="button"  class="btn btn-dark lihat">Lihat Profil</button></a>
      </div>

    <?php   endif; ?>
    <?php   endif; ?>
      @endforeach


	</div>
   
	<div class="row p-rw hilang">
     @foreach($suara as $item)
    <?php   if ($item->calon == "rw" ) : ?>
      <?php  if ($loop->iteration==1 || $loop->iteration==3) : ?>
		<div class="col-5 offset-1" style="text-align: center;">
      		<img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
          <h2>{{$item->getCalon->nama}}</h2> 
          <a href="/profile/calon/{{$item->id_calon}}"><button type="button"  class="btn btn-dark lihat">Lihat Profil</button></a>
      </div>
        <?php   endif; ?>
    <?php  if ($loop->iteration==2 || $loop->iteration==4) : ?>
      <div class="col-5" style="text-align: center;">
      		<img src="{{url('calon/300/'.$item->getCalon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="200px" height="200px">
          <h2 >{{$item->getCalon->nama}}</h2>
          <a href="/profile/calon/{{$item->id_calon}}"><button type="button"  class="btn btn-dark lihat">Lihat Profil</button></a>
      </div>
      <?php   endif; ?>
    <?php   endif; ?>
      @endforeach
	</div>




</div>
@endsection





@section('script')

@endsection