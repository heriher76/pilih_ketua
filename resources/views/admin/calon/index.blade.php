@extends('layouts.admin')

@section('title','Admin | List Calon')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Calon</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
  <a href="{{ url('/admin/calon/create') }}"><button class="btn btn-primary"><i class="fas fa-plus"></i>
    Tambah Calon</button></a>

  </form>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <td>No</td>
            <th>Nama</th>
            <th>Email</th>
            <th>TTL</th>
            <th>Pekerjaan</th>
            <th>Verif</th>
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
        @foreach($calons as $key => $calon)
          <tr>  
            <td>{{ $key+1 }}</td>
            <td>{{ $calon->nama }}</td>
            <td>{{ $calon->email }}</td>
            <td>{{ $calon->ttl }}</td>
            <td>{{ $calon->pekerjaan }}</td>
            <td>
              @if($calon->verif_calon == 1)
                Terverifikasi
              @else
                Bakal Calon
              @endif
            </td>
            <td>
              <a href="{{ url('/admin/calon/verif/'.$calon->id) }}"><button class="btn btn-info">Verif</button></a>
              <a href="{{ url('/admin/calon/edit/'.$calon->id) }}"><button class="btn btn-warning">Ubah</button></a>
              <form action="{{ url('/admin/calon/delete/'.$calon->id) }}"  style="display: inline;" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-danger" value="Delete"  onclick="return confirm('Anda Yakin Akan Menghapus Calon ini?')">
              </form>
            </td>
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
