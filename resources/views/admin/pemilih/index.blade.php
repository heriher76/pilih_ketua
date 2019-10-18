@extends('layouts.admin')

@section('title','Admin | List Pemilih')

@section('content')
   

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Pemilih</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
          <a href="/admin/pemilih/create"><button class="btn btn-primary"><i class="fas fa-plus"></i>
            Tambah Pemilih</button></a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <td>No</td>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>RW</th>
                    <th>Kelurahan</th>
                    <th >Action</th>
                    
                  </tr>
                </thead>
                
                <tbody>

                @foreach($tabel as $item)
                  <tr>  
                    <td>{{$loop -> iteration}}</td>
                    <td>{{$item->nik}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                     <td>{{$item->alamat}}</td>
                      <td>{{$item->getRt->nama}}</td>
                      <td>{{$item->getRt->getRw->nama}}</td>
                      <td>{{$item->getRt->getRw->getKel->nama}}</td>
                    
                    <td>
                      <a href="/admin/pemilih/view/{{$item->id}}"><button class="btn btn-info">Lihat</button></a>
                      <a href="/admin/pemilih/edit/{{$item->id}}"><button class="btn btn-warning">Ubah</button></a>
                      <form action="/admin/pemilih/delete/{{$item->id}}"  style="display: inline;" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
        
                         <input type="submit" class="btn btn-danger" value="Delete"  onclick="return confirm('Anda yakin mau menghapus item ini ?')">

                    </form></td>
                  </tr>
                  @endforeach

                 
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
@endsection

@section('sidebar')
  @include('partials._sidebarAdmin')
@endsection
