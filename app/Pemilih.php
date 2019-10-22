<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

// class Pemilih extends Model
class Pemilih extends Authenticatable implements MustVerifyEmail
{
	use Notifiable;
	
    protected $guard = 'pemilih';
    protected $fillable = [
       'id', 'email', 'password', 'nik', 'nama', 'jenis_kelamin','golongan_darah','alamat','agama','status','pekerjaan', 'kewarganegaraan','masa berlaku','photo','tanggal_pembuatan','tempat_pembuatan','selesai_milih'
    ];	
    protected $hidden = ['password', 'remember_token'];
}