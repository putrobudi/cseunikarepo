<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    public function user(){
       return $this->hasOne('App\User');
    }

    public function siswas(){
        return $this->hasMany('App\Siswa');
    }


}
