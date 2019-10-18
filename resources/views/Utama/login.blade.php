@extends('layouts.master')

@section('title','Login')

@section('nav')
  @include('partials._nav')  
@endsection

@section('style')
<style>
#ver-line {
  border-left: 6px solid white;
  height: 80vh;
}
</style>
@endsection

@section('main')

    <!-- Main Section -->
    <section class="main-jari">
        <!-- Add Your Content Inside -->
        <div class="content" style="height: 100%;">
            <!-- Remove This Before You Start -->
           
            @if(\Session::has('alert-success'))
                <div class="alert alert-success">
                    <div>{{Session::get('alert-success')}}</div>
                </div>
            @endif
            <center>
            <div class="row">
            <div class="col-md-6">
            <div class="panel panel-default">
            <h1>Login</h1>
            <br>
            <div class="panel-body">
              <form action="{{ route('home.login.submit') }}" method="post" style="text-align: center;">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <div class="col-md-12">
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>

                        <a class="btn btn-link" href="{{ route('password.request') }}" style="color: white;">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
              </form>

            </div>
          </div>
        </div> 
        <div class="col-md-6" id="ver-line" style="height: 100%;">
            <div class="panel panel-default">
            <hr class="d-sm-none">
            <h1>Register</h1>
            <br>
            <div class="panel-body">
                <form action="{{ url('/registerPost') }}" method="post">
                  {{csrf_field()}}
                  <div class="card-header">
                    <input type="text" id="nama"  name="nama" class="form-control" placeholder="Nama Lengkap" required="">
                    <br>
                    <input type="email" id="email"  name="email" class="form-control" placeholder="Email" required="">
                    <br>
                    <input type="password" id="password"  name="password" class="form-control" placeholder="Password" required="">
                    <input type="password" id="password"  name="confirm_password" class="form-control" placeholder="Konfirmasi Password" required="">
                    <br>
                    <label for="gender">Jenis Kelamin : </label>
                    <select required="" class="form-control" name="jenis_kelamin" id="gender">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <br>
                    <textarea placeholder="Alamat Lengkap"  required="" name="alamat" id="alamat" class="form-control" cols="30" rows="2"></textarea>
                    <br>
                    <input type="text" id="agama" required=""  name="agama" class="form-control" placeholder="Agama">
                    <br>
                    <label for="status">Status : </label>
                    <select required="" class="form-control" name="status" id="status">
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                    </select>
                    <br>
                    <input type="text" id="kerja" required=""  name="pekerjaan" class="form-control" placeholder="Pekerjaan">
                  </div>
                  <div class="card-footer"><button class="btn btn-success" type="submit"><i class="fas fa-plus"></i>
                    Register</button>
                  </div>
                </form>
            </div>
        </div>
        </div> 
        </div>
        </center>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection

@section('script')
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

@endsection
