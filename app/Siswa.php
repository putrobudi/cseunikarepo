<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public function user(){
       return $this->hasOne('App\User');
    }

    public function dosens(){
        return $this->belongsTo('App\Dosen');
    }
}
