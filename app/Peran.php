<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peran extends Model
{
    public function user(){
       return $this->hasMany('App\User');
    }
}
