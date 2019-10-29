<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function kegiatans(){
        return $this->hasMany('App\Kegiatan');
    }

    public function perans(){
        return $this->belongsTo('App\Peran');
    }

    public function siswas(){
        return $this->belongsTo('App\Siswa');
    }

    public function dosens(){
        return $this->belongsTo('App\Dosen');
    }

    
    
}
