<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Pemilih;
use App\Logged;
use Alert;

class LoginPemilihController extends Controller
{
    // public function index(){
    //     if(!Session::get('login')){
    //         return redirect('login')->with('alert','Harus Login Terlebih Dahulu');
    //     }
    //     else{
    //         return view('user');
    //     }
    // }

    public function __construct(){
        $this->middleware('guest:pemilih');
    }

    public function showLoginForm(){
        if (request()->input('true') == 1) {
            Alert::info('Silahkan Login!', 'Untuk Langsung Memilih Calon Pilihan Anda.');
        }
        
        return view('Utama.login');
    }
 
    public function login (Request $request){
        // Validate The form
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
 
        // Attempt to log the user in
        if (Auth::guard('pemilih')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intendd location
            return redirect()->intended(route('home'));
        }
 
        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    // public function login(){
    //     return view('utama.login');
    // }

    public function logout(){
        Session::flush();
        return redirect('login')->with('alert','Berhasil Logout');
    }

    public function registerPost(Request $request){
        $this->validate($request, [
            'nama' => 'required|min:4',
            'email' => 'required|min:4|email|unique:pemilihs',
            'password' => 'required',
            'confirm_password' => 'same:password'
        ]);

        $input = $request->all();
        // dd($input);
        Pemilih::create([
            'nama' => $input['nama'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'jenis_kelamin' => $input['jenis_kelamin'],
            'alamat' => $input['alamat'],
            'agama' => $input['agama'],
            'status' => $input['status'],
            'pekerjaan' => $input['pekerjaan']
        ]);

        return back()->with('alert-success','Kamu berhasil Register');
    }
}