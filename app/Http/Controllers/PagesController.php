<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kegiatan;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function getHMPSSI(){

        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $id_peran = $user->id_peran;

        $kegiatans = Kegiatan::where('Status', 'HMPSSI')
        ->orderBy('created_at', 'desc')
        ->get();


        return view('hmpssi')
        ->with('kegiatans', $kegiatans)
        ->with('peran_id', $id_peran);
    }

    public function getBEM(){
        return view('bem');
    }

    public function getSenat(){
        return view('senat');
    }

    public function getHMPTI(){
        return view('hmpti');
    }

    
}
