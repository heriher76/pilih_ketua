<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilih;
use Carbon\Carbon;
use Image;
use File;

class PagePemilihController extends Controller
{    
    
     public function index()
    {		
    	$tabel = pemilih::all();

    	return view('admin.pemilih.index',compact("tabel"));
    }
    public function create()
    {
    	return view('admin.pemilih.create');
    }
    public function edit($id)
    { 
      $pemilih = pemilih::find($id);
      return view('admin.pemilih.edit',compact("pemilih"));
      # code...
    }
    public function show($id)
    {
    	$pemilih = Pemilih::find($id);
    	return view('admin.pemilih.show',compact("pemilih"));	
    }

    public $path;
    public $dimensions;

    public function __construct()
    {      $this->middleware('auth');
        //DEFINISIKAN PATH
        $this->path = public_path('pemilih');
        //DEFINISIKAN DIMENSI
        $this->dimensions = ['245', '300'];
    }
	
    public function store(Request $req)
    {
    	$pemilih = new Pemilih;
    	 $this->validate($req, [
            'foto' => 'image|mimes:jpg,png,jpeg'
        ]);
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
		
        $file = $req->file('foto');
        
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        Image::make($file)->save($this->path . '/' . $fileName);
		
        
        foreach ($this->dimensions as $row) {
        
            $canvas = Image::canvas($row, $row);    
            
            $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });
			
        
            if (!File::isDirectory($this->path . '/' . $row)) {
        
                File::makeDirectory($this->path . '/' . $row);
            }        	
            $canvas->insert($resizeImage, 'center');
            $canvas->save($this->path . '/' . $row . '/' . $fileName);
        }
        
       $pemilih->nik = $req->nik;
       $pemilih->nama = $req->nama;
       $pemilih ->jenis_kelamin = $req->gender;
       $pemilih->agama = $req->agama;
       $pemilih->pekerjaan = $req->pekerjaan;
       $pemilih->status = $req->status;
       $pemilih ->golongan_darah = $req->darah;
       $pemilih->alamat= $req->alamat;
       $pemilih->kewarganegaraan = $req->pkn;
       $pemilih->masa_berlaku = $req->masa;
       $pemilih->foto = $fileName;
       $pemilih->tanggal_pembuatan = $req->pembuatan;
       $pemilih->tempat_pembuatan = $req->tempat;
       $pemilih->id_rt = $req->rt;
       $pemilih->id_fp = $req->id_fp;
       $pemilih->save();
       return redirect('/admin/pemilih');




    }

    public function destroy($id)
    {
    	Pemilih::destroy($id);
    	return redirect('/admin/pemilih');
    }
   public function update(Request $req,$id)
    {
      $pemilih = pemilih::find($id);
      
       $this->validate($req, [
            'foto' => 'image|mimes:jpg,png,jpeg'
        ]);
        if (!File::isDirectory($this->path)) {
            File::makeDirectory($this->path);
        }
    
        $file = $req->file('foto');
        
        $fileName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        Image::make($file)->save($this->path . '/' . $fileName);
    
        
        foreach ($this->dimensions as $row) {
        
            $canvas = Image::canvas($row, $row);
        
        
            $resizeImage  = Image::make($file)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });
      
        
            if (!File::isDirectory($this->path . '/' . $row)) {
        
                File::makeDirectory($this->path . '/' . $row);
            }
          
        
            $canvas->insert($resizeImage, 'center');
        
            $canvas->save($this->path . '/' . $row . '/' . $fileName);
        }
        
       $pemilih->nik = $req->nik;
       $pemilih->nama = $req->nama;
       $pemilih ->jenis_kelamin = $req->gender;
       $pemilih->agama = $req->agama;
       $pemilih->pekerjaan = $req->pekerjaan;
       $pemilih->status = $req->status;
       $pemilih ->golongan_darah = $req->darah;
       $pemilih->alamat= $req->alamat;
       $pemilih->kewarganegaraan = $req->pkn;
       $pemilih->masa_berlaku = $req->masa;
       $pemilih->foto = $fileName;
       $pemilih->tanggal_pembuatan = $req->pembuatan;
       $pemilih->tempat_pembuatan = $req->tempat;
       $pemilih->id_rt = $req->rt;
       $pemilih->id_fp = $req->id_fp;
       $pemilih->save();
       return redirect('/admin/pemilih');




    }

   
}
