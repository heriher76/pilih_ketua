@extends('layouts.master')

@section('title','Profile')

@section('nav')
<a class="nav-item nav-link " href="/home/login" style="">Home </a>
      <a class="nav-item nav-link active" href="/profile">Profile<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="/rekapitulasi">Rekapitulasi</a>
@endsection

@section('main')
<div class="main view_prof">
	<div class="container">
		<div class="row" style="margin-top: 30px">
			<div class="col-4" style="text-align: center;">
				<img src="{{url('calon/300/'.$calon->foto)}}" class="mx-auto d-block  rounded-circle" alt="Cinque Terre" width="230px" height="230px">
				<div class="bio" > <h6>{{$calon->gender}}</h6> </div>
				<div class="bio">
				<h6>{{$calon->status}}</h6></div>
				<div class="bio">
				<h6>{{$calon->ttl}}</h6></div>
					
				<div class="bio">
				<h6>{{$calon->pekerjaan}}</h6></div>
			</div>

			<div class="col-8">
				<h1>{{$calon->nama}}</h1>
				<h1>{{$calon->umur}}th</h1>
				<div class="biot" style="height: 100px;background-color: rgba(0,3,1,0.25);border-radius: 15px;padding: 6px;">
					<h5> Visi : </h5>
					
						<h5 style="text-align: center;">"{{$calon->visi}}"</h5>
					
				</div>
				<br>
				<div class="biot"  style="height: 200px;background-color: rgba(0,3,1,0.25);border-radius: 15px;padding: 6px;">
					<h5>Misi : </h5>
					<h6 class="misi">{!!$calon->misi!!}</h6>
				</div>
					
			</div>
		</div>
	</div>
</div>

@Endsection