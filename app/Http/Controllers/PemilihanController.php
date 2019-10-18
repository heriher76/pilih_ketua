<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PemilihanController extends Controller
{
	public function __construct() {
		$this->middleware('auth:pemilih'); // Here auth is middleware and admin is guard
	}

    public function index()
    {dd(1);
        return view('utama.home');
    }
}
