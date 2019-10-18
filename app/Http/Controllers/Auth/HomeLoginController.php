<?php
namespace App\Http\Controllers\Auth;
use App\pemilih;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class pemilihLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $guard = 'pemilih';
    protected $redirectTo = '/';

    public function __construct()
    {   
         $this->middleware('pemilih')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.PemilihLogin');
    }

    public function guard()
    {
        return auth()->guard('pemilih');
    }

    public function showRegisterPage()
    {
        return view('auth.pemilihregister');
    }

    public function register(Request $request)
    {
        $request->validate([
           'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        pemilih::create([
             'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('pemilih-login')->with('success','Registration Success');
    }
    
    public function login(Request $request)
    {
        if (auth()->guard('pemilih')->attempt(['email' => $request->email, 'password' => $request->password ])) {
            return redirect()->route('pemilihpage');
        }
        return back()->withErrors(['email' => 'Email or password are wrong.']);
    }
}