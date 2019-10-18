@extends('layouts.admin')


@section('title','Pemilih')

@section('content')

  <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Pemilih</li>
        </ol>
<div class="card mb-3">
          <div class="card-header">
          <h3>Pemilih</h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  	<tr>
                    <th>ID</th>
                    <td>{{$pemilih->id}}</td>
                   	</tr>
                   	<tr>	
                    <th>NIK</th>
                    <th>	{{$pemilih->nik}}</th>
                    </tr>
                    <tr>	
                    <th>Nama</th>
                    <td>{{$pemilih->nama}}</td>
                    </tr>
                    <tr>	
                    <th>Jenis Kelamin</th>
                    <td>{{$pemilih->jenis_kelamin}}</td>
					</tr>
					<tr>	
                    <th>Golongan Darah</th>
                    <td>	{{$pemilih->golongan_darah}}</td>
                    </tr>
                    <tr>	
                    <th>Agama</th>
                    <td>	{{$pemilih->agama}}</td>
                    </tr>
                    <tr>	
                    <th>	Status</th>
                    <td>	{{$pemilih->status}}</td>
                    </tr>
                    <tr>	
                    <th>	Pekerjaan</th>
                    <td>	{{$pemilih->pekerjaan}}</td>
                    </tr>
                    <tr>	
                    <th>	Kewarganegaraan</th>
                    <td>	{{$pemilih->kewarganegaraan}}</td>
                    </tr>
                    <tr>	
                    <th>Alamat</th>
                    <td>{{$pemilih->alamat}}</td>
                    </tr>
                    <tr>	
                    <th>RT</th>
                    <td>{{$pemilih->getRt->nama}}</td>
                    </tr>
                    <tr>	
                    <th>RW</th>
                    <td>{{$pemilih->getRt->getRw->nama}}</td>
                    </tr>
                    <tr>	
                    <th>Kelurahan</th>
                    <td>{{$pemilih->getRt->getRw->getKel->nama}}	</td>
                    </tr>
                    <tr>	
                    <th>	Masa Berlaku</th>
                    <td>	{{$pemilih->masa_berlaku}}</td>
                    </tr>
                    <tr>	
                    <th>	Tanggal Pembuatan</th>
                    <td>	{{$pemilih->tanggal_pembuatan}}</td>
                    </tr>
                    <tr>	
                    <th>	Tempat Pembuatan</th>
                    <td>	{{$pemilih->tempat_pembuatan}}</td>
                    </tr>
                    <tr>	
                    <th colspan="2">	Foto</th>
                	</tr>
                	<tr>	
                    <td>	<img src="{{asset('pemilih/'.$pemilih->foto)}}" width="400px;" alt=""></td>
                    </tr>	
                    
                  
                </thead>
                
        












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
