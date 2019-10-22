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
            <h2>List Pemilih</h2>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <td>No</td>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Pekerjaan</th>
                    <th>Pemilihan</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                
                <tbody>

                @foreach($tabel as $key => $item)
                  <tr>  
                    <td>{{$key+1}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->jenis_kelamin}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->agama}}</td>
                    <td>{{$item->status}}</td>
                    <td>@if ($item->selesai_milih) Selesai @else Belum Milih @endif</td>
                    <td>
                      <a href="{{ url('/send/send_feedback/'.$item->id) }}"><button class="btn btn-primary">Kirim Link</button></a>
                      <a href="{{ url('/admin/pemilih/edit/'.$item->id) }}"><button class="btn btn-warning">Ubah</button></a>
                      <form action="{{ url('/admin/pemilih/delete/'.$item->id) }}"  style="display: inline;" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
        
                         <input type="submit" class="btn btn-danger" value="Delete"  onclick="return confirm('Anda Yakin Akan Menghapus Pemilih ini?')">

                    </form></td>
                  </tr>
                  @endforeach

                 
                </tbody>
              </table>
            </div>
          </div>
        </div>
@endsection

@section('sidebar')
  @include('partials._sidebarAdmin')
@endsection
