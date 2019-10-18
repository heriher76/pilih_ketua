<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suara extends Model
{
    protected $table = 'suaras';
    protected $fillable = ['id_calon','suara'];


    public function getCalon()
    {
    	return $this->belongsTo('App\calon','id_calon');
    }
}
