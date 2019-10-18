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
          <form action="/admin/pemilih/edit/{{$pemilih->id}}" method="post" enctype="multipart/form-data">
          <div class="card-header">
          	<label for="nik">NIK : </label>
            <input type="number" id="nik"  name="nik" class="form-control" value="{{$pemilih->nik}}" placeholder="NIK" required="">
            <label for="nama">Nama : </label>
            <input type="text" id="nama"  name="nama" class="form-control" placeholder="Nama Lengkap" value="{{$pemilih->nama}}" required="">	
            <label for="">Jenis Kelamin : </label>
            <input type="radio"  value="Laki-laki" class="form" id="laki"   name="gender"><label for="laki">Laki-Laki</label>
            <input required="" id="pr" type="radio"  value="Perempuan" class="form" name="gender"><label for="pr">Perempuan</label><br>
            <label for="darah">Golongan Darah : </label>
            <select  class="form-control" name="darah" id="darah">
            	<option value="-">Pilih Jika Tahu</option>
            	<option value="A">A</option>
            	<option value="B">B</option>
            	<option value="AB">AB</option>
            	<option value="O">O</option>
            </select>           <br>
            <label   for="alamat">Alamat :</label> <br>
            <textarea  required="" name="alamat" id="alamat" class="form-control" cols="30" rows="3">{{$pemilih->alamat}}</textarea>
            <label for="agama">Agama : </label>
             <select required="" class="form-control" name="agama" id="agama">
            	<option value="islam">Islam</option>
            	<option value="Kristen Protestan">Kristen Protestan</option>
            	<option value=" Katolik"> Katolik</option>
            	<option value="Hindu">Hindu</option>
            	<option value="Buddha">Buddha</option>
            	<option value=" Kong Hu Cu"> Kong Hu Cu</option>
            </select>           <br>
            <label for="status">Staus : </label>
            <input type="radio" value="menikah" name="status"> Menikah
            <input checked="" type="radio" value="belum menikah" name="status"> Belum Menikah <br>
            <label for="pkn">Kewarganegaraan : </label>
            <input checked="" type="radio" value="wni"  name="pkn"> WNI
            <input type="radio" value="wna" name="pkn"> WNA <br>
            <label for="kerja">Pekerjaan : </label>
            <input type="text" id="kerja" required=""  value="{{$pemilih->pekerjaan}}" name="pekerjaan" class="form-control" placeholder="Pekerjaan">
            <label for="masa">Masa Berlaku : </label>
            <input type="text" required="" id="masa"  value="{{$pemilih->masa_berlaku}}" name="masa" class="form-control" placeholder="Masa Berlaku">
            <label for="tanggal"> Tanggal Pembuatan :</label>
            <input required="" type="date" id="tanggal"  name="pembuatan" value="tanggal_pembuatan" class="form-control" placeholder="Pembuatan">
            <label for="tempat">Tempat Pembuatan : </label>
            <input required="" type="text" id="tempat"  value="tempat_pembuatan" name="tempat" class="form-control" placeholder="Daerah Pembuatan">
            <label for="rt">ID RT : </label>
            <input required="" type="number" id="rt" value="{{$pemilih->id_rt}}" name="rt" class="form-control" placeholder="ID RT PEMILIH">
            <label for="rt">ID Sidik Jari : </label>
            <input required="" type="number" id="fp" value="{{$pemilih->id_fp}}" name="id_fp" class="form-control" placeholder="ID Sidik Jari PEMILIH">
            <div class="form-group">
              <img src="{{url('pemilih/'.$pemilih->foto)}}" width="100px" alt=""><br>
                                <label for="">Pilih gambar</label>

                                <input type="file" name="foto">
                                <p class="text-danger">{{ $errors->first('image') }}</p>
            </div>

				



          
          </div>
          {{csrf_field()}}
     {{method_field('PUT')}}


          <div class="card-footer"><button class="btn btn-primary" type="submit"><i class="fas fa-plus"></i>
            Update</button>
          </div>
          </form>
        </div>




@endsection

@section('sidebar')
 <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="/admin">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>w
      </li>
      <li class="nav-item active">
        <a class="nav-link " href="/admin/pemilih">
           <i class="fas fa-fw fa-folder"></i>
          <span>Pemilih</span>
        </a>
      </li>
       <li class="nav-item ">
        <a class="nav-link " href="/admin/calon">
           <i class="fas fa-fw fa-folder"></i>
          <span>Calon</span>
        </a>
      </li>
      
      <li class="nav-item ">
        <a class="nav-link " href="/admin/kelurahan">
           <i class="fas fa-fw fa-folder"></i>
          <span>Kelurahan</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/admin/rw">
          <i class="fas fa-fw fa-folder"></i>
          <span>RW</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="/admin/rt">
          <i class="fas fa-fw fa-folder"></i>
          <span>RT</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="login.html">Login</a>
          <a class="dropdown-item" href="register.html">Register</a>
          <a class="dropdown-item" href="forgot-password.html">Forgot Password</a>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="404.html">404 Page</a>
          <a class="dropdown-item" href="blank.html">Blank Page</a>
        </div>
      </li>
    </ul>
@endsection
