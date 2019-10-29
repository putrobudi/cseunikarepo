<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
}
