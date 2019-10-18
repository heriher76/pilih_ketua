<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Suara;
use App\Daerah;
use Carbon\Carbon;
use Image;
use File;

class PagecalonController extends Controller
{
    public function __construct()
    {    
      $this->middleware('auth');
    }
    public function index()
    { 
      $calons = Calon::all();

      return view('admin.calon.index', compact('calons'));
    }

    public function create()
    {
      return view('admin.calon.create');
    }
	
    public function store(Request $req)
    {
      $calon = new Calon;

      (null !== $req->file('foto')) ? $namaThumbnail = str_random().'.'.$req->file('foto')->getClientOriginalExtension() : $namaThumbnail = null;
      
      (null !== $req->file('foto')) ? $req->file('foto')->move(public_path('calon'), $namaThumbnail) : null ;

      $calon->nama = $req->nama;
      $calon->email = $req->email;
      $calon->gender= $req->gender;
      $calon->agama = $req->agama;
      $calon->pekerjaan = $req->pekerjaan;
      $calon->status = $req->status;
      $calon->foto = $namaThumbnail;
      $calon->umur = $req->umur;
      $calon->visi = $req->visi;
      $calon->misi= $req->misi;
      $calon->ttl = $req->ttl;
      $calon->save();
      
      $calon = Calon::orderBy('id','desc')->first();
      
      $suara = new Suara;
      $suara->id_calon = $calon->id;
      $suara->suara = 0;
      $suara->save();
      return redirect('/admin/calon');
    }

    public function verif($id) 
    {
      $calon = Calon::where('id', $id)->first();
      $calon->update([
        'verif_calon' => 1
      ]);
      
      return back();
    }
    public function edit($id)
    {
      $calon = Calon::where('id', $id)->first();

      return view('admin.calon.edit', compact('calon'));
    }
    public function update(Request $request, $id)
    {
      $input = $request->all();
      $calon = Calon::where('id', $id)->first();

      if (isset($input['foto'])) {
          $namaThumbnail = str_random().'.'.$input['foto']->getClientOriginalExtension();
          
          if (isset($calon->foto)) {
              unlink(public_path('calon/'.$calon->foto));
          }
          $input['foto']->move(public_path("calon/"), $namaThumbnail);  

          $calon->update([
            'nama' => $input['nama'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'agama' => $input['agama'],
            'status' => $input['status'],
            'ttl' => $input['ttl'],
            'pekerjaan' => $input['pekerjaan'],
            'umur' => $input['umur'],
            'visi' => $input['visi'],
            'misi' => $input['misi'],
            'foto' => $namaThumbnail
          ]);
      }else{
          $calon->update([
            'nama' => $input['nama'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'agama' => $input['agama'],
            'status' => $input['status'],
            'ttl' => $input['ttl'],
            'pekerjaan' => $input['pekerjaan'],
            'umur' => $input['umur'],
            'visi' => $input['visi'],
            'misi' => $input['misi']
          ]);
      }
      return back();
    }
    public function destroy($id)
    {
      $calon = Calon::where('id', $id)->first();
      if (isset($calon->foto)) {
          unlink(public_path('calon/'.$calon->foto));
      }
      Calon::destroy($id);
      return back();
    }
}