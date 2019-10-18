@extends('layouts.admin')

@section('title','Admin | Tambah Calon')

@section('content')
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="{{ url('/admin') }}">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Tambah Calon</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
  <form action="{{ url('/admin/calon') }}" method="post" enctype="multipart/form-data">
  <div class="card-header">
    <label for="nama">Nama : </label>
    <input type="text" id="nama"  name="nama" class="form-control" placeholder="Nama Lengkap" required="">	
    <br>
    <label for="email">Email : </label>
    <input type="email" id="email"  name="email" class="form-control" placeholder="Email" required="">  
    <br>
    <label for="">Jenis Kelamin : </label>
    <input checked="" type="radio"  value="Laki-laki" class="form" id="laki"  name="gender"><label for="laki">Laki-Laki</label>
    <input required="" id="pr" type="radio"  value="Perempuan" class="form" name="gender"><label for="pr">Perempuan</label><br>
    <br>
    <label for="agama">Agama : </label>
      <input type="text" name="agama" id="agama" class="form-control" required="">
    <br>
    <label for="status">Status : </label>
    <input type="radio" value="menikah" name="status"> Menikah
    <input checked="" type="radio" value="belum menikah" name="status"> Belum Menikah <br>
    <br>
    <label for="alamat">Tempat, Tanggal Lahir :</label> <br>
    <input type="text" class="form-control" id="alamat" name="ttl" required="" placeholder="ex: Sumedang, 20 November 1999">
    <br>
    <label for="kerja">Pekerjaan : </label>
    <input type="text" id="kerja" required=""  name="pekerjaan" class="form-control" placeholder="Pekerjaan">
    <br>
    <label for="umur">Umur : </label>
    <input type="number" id="umur" required=""  name="umur" class="form-control" placeholder="Umur">
    <br>
    <label for="visi">Visi : </label>
    <textarea name="visi" id="visi" cols="30" class="form-control" rows="2"></textarea>
    <br>
    <label for="misi">Misi : </label>
    <textarea name="misi" id="misi" cols="30" class="form-control" rows="5"></textarea>
    <br>
    <div class="form-group">
      <label for="">Pilih Gambar : </label>
      <input type="file" name="foto">
      <p class="text-danger">{{ $errors->first('image') }}</p>
    </div>
  
  </div>
  {{csrf_field()}}
  <div class="card-footer"><button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i>
    Tambah Calon</button>
  </div>
  </form>
</div>
@endsection

@section('sidebar')
  @include('partials._sidebarAdmin')
@endsection