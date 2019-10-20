<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilih;
use App\Suara;
use App\Calon;
use App\daerah;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Logged;

class UtamaController extends Controller
{   	
    public function profile(){
        $calons = Calon::all();
        return view('utama.profile',compact('calons'));
    }
    public function rekap(){
        $suara = Suara::all();
        $totalSuara = \DB::table('suaras')->sum('suara');
        return view('utama.rekapitulasi',compact('suara', 'totalSuara'));
    }
    public function store(Request $req)
    {
            $rw = suara::find($req->rt);
            $rw->suara++;
            $rw->save();
            $rt = suara::find($req->rw);
            $rt->suara++;           
            $rt->save();

            $logged = Logged::where('id_fp', $_GET['id'])->first();
            $logged->update([
                'selesai' => 1
            ]);

            Session::flush();
            return redirect('/home/login');
    }
    public function show($id)
    {
        $calon = calon::find($id);
        return view('utama.show',compact('calon'));
    }
}
