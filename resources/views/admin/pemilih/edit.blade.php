@extends('layouts.admin')


@section('title','Pemilih')

@section('content')
		 <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Pemilih</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <form action="{{ url('/admin/pemilih/'.$pemilih->id) }}" method="post">
          {{csrf_field()}}
          {{method_field('PUT')}}
          <div class="card-header">
            <label for="nama">Nama : </label>
            <input type="text" id="nama"  name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$pemilih->nama}}" required=""> 
          	<br>
            <label for="email">Email : </label>
            <input type="email" id="email"  name="email" class="form-control" value="{{ $pemilih->email }}" placeholder="Email" required="">
            <br>
            <label for="">Jenis Kelamin : </label>
            <input type="radio" value="Laki-laki" class="form" id="laki" checked="" name="gender"><label for="laki">Laki-Laki</label>
            <input id="pr" type="radio"  value="Perempuan" class="form" name="gender"><label for="pr">Perempuan</label><br>
            <br>
            <label   for="alamat">Alamat :</label> <br>
            <textarea  required="" name="alamat" id="alamat" class="form-control" cols="30" rows="3">{{$pemilih->alamat}}</textarea>
            <br>
            <label for="agama">Agama : </label>
            <input type="text" id="agama" name="agama" class="form-control" placeholder="Agama" value="{{$pemilih->agama}}" required=""> 
            <br>
            <label for="status">Status : </label>
            <input type="radio" value="menikah" name="status"> Menikah
            <input checked="" type="radio" value="belum menikah" name="status"> Belum Menikah 
            <br>
            <br>
            <label for="kerja">Pekerjaan : </label>
            <input type="text" id="kerja" required=""  value="{{$pemilih->pekerjaan}}" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
            <br>
          </div>

          <div class="card-footer"><button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i>
            Update</button>
          </div>
          </form>
        </div>




@endsection

@section('sidebar')
  @include('partials._sidebarAdmin')
@endsection
