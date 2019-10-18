<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    protected $Table = 'calons';
       protected $fillable = [
       'nama', 'email', 'gender','ttl','status','pekerjaan','umur', 'foto','umur','visi','misi','verif_calon'
    ];
}
