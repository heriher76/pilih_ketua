<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Calon;
use App\Suara;

class PemilihanController extends Controller
{
	public function __construct() {
		$this->middleware(['auth:pemilih', 'verified']); // Here auth is middleware and admin is guard
	}

    public function index()
    {
    	$dataPemilih = \Auth::user();
        if ($dataPemilih->selesai_milih !== null) {
            Session::flush();
            return abort(403);
        }
        
    	$calons = Calon::where('verif_calon', 1)->get();

        return view('utama.home', compact('calons'));
    }

    public function store(Request $request)
    {
    	$input = $request->all();
    	$dataPemilih = \Auth::user();
    	if($dataPemilih->selesai_milih == null) {
    		$dataPemilih->update([
    			'selesai_milih' => $input['id_calon']
    		]);
    		$calon = Calon::where('id', $input['id_calon'])->first();
    		if ($calon !== null) {
    			$suara = Suara::where('id_calon', $input['id_calon'])->first();
    			if ($suara === null) {
    				Suara::create([
    					'id_calon' => $input['id_calon'],
    					'suara' => 1
    				]);
    			}else{
    				$suara->update([
    					'suara' => \DB::raw('suara+1')
    				]);
    			}
    		}
    	}else{
    		echo('sudah milh');
    	}
    	
    	Session::flush();
        return redirect('/home/login');
    }
}
