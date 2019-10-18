@extends('layouts.master')

@section('title','Login')

@section('nav')
@include('partials._nav')
@endsection

@section('main')

    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>Anak IT -  Login</h1>
            <hr>
            @if(\Session::has('alert'))
                <div class="alert alert-danger">
                    <div>{{Session::get('alert')}}</div>
                </div>
            @endif
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <form action="{{ url('/loginPost') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Nik:</label>
                    <input type="number" class="form-control" id="email" name="nik">
                </div>
                <!-- <div class="form-group">
                    <label for="alamat">Password:</label>
                    <input type="password" class="form-control" id="password" name="password"></input>
                </div> -->
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Login</button>
                </div>
            </form>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection


@section('script')
 
@endsection
