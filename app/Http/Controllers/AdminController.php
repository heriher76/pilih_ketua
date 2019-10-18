<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suara;
use App\User;

class AdminController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	return view('admin.index');
    }
    public function listAdministrator() 
    {
    	$admins = User::all();
    	// $admins = User::where('id', '!=', \Auth::user()->id)->get();
    	return view('admin.administrator.index', compact('admins'));
    }
    public function createAdministrator() 
    {
    	return view('admin.administrator.create');
    }
    public function editAdministrator($id) 
    {
    	$admin = User::where('id', $id)->first();

    	return view('admin.administrator.edit', compact('admin'));
    }
    public function updateAdministrator(Request $request, $id)
    {
    	$input = $request->all();
    	$admin = User::where('id', $id)->first();
    	
    	if ($input['password'] !== null) {
    		$admin->update([
    			'name' => $input['name'],
    			'email' => $input['email'],
    			'password' => Hash::make($input['password']),
    		]);
    	}else{
    		$admin->update([
    			'name' => $input['name'],
    			'email' => $input['email']
    		]);
    	}

    	return back();
    }
    public function destroyAdministrator($id)
    {
    	User::destroy($id);

    	return back();
    }
}
