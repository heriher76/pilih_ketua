@extends('layouts.admin')

@section('title','Admin | List Administrator')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
  <li class="breadcrumb-item active">Administrator</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
  <div class="card-header">
  <a href="{{ url('/admin/administrator/create') }}"><button class="btn btn-primary"><i class="fas fa-plus"></i>
    Tambah Admin</button></a>

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
            <th>Action</th>
          </tr>
        </thead>
        
        <tbody>
        @foreach($admins as $key => $admin)
          <tr>  
            <td>{{ $key+1 }}</td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
              <a href="{{ url('/admin/administrator/edit/'.$admin->id) }}"><button class="btn btn-warning">Ubah</button></a>
              <form action="{{ url('/admin/administrator/delete/'.$admin->id) }}"  style="display: inline;" method="post">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-danger" value="Delete"  onclick="return confirm('Anda Yakin Akan Menghapus Admin ini?')">
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
