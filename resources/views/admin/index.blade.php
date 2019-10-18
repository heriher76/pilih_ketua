@extends('layouts.admin')


@section('title','Dashboard')

@section('content')

<ol class="breadcrumb">
  <li class="breadcrumb-item">
    <a href="#">Dashboard</a>
  </li>
</ol>

@endsection

@section('sidebar')
  @include('partials._sidebarAdmin')
@endsection
