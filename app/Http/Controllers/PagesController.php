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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $id_peran = $user->id_peran;

        $kegiatans = Kegiatan::where('Status', 'BEM')
        ->orderBy('created_at', 'desc')
        ->get();


        return view('bem')
        ->with('kegiatans', $kegiatans)
        ->with('peran_id', $id_peran);
    }

    public function getSenat(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $id_peran = $user->id_peran;

        $kegiatans = Kegiatan::where('Status', 'Senat')
        ->orderBy('created_at', 'desc')
        ->get();


        return view('senat')
        ->with('kegiatans', $kegiatans)
        ->with('peran_id', $id_peran);
    }

    public function getHMPTI(){
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $id_peran = $user->id_peran;

        $kegiatans = Kegiatan::where('Status', 'HMPTI')
        ->orderBy('created_at', 'desc')
        ->get();


        return view('hmpti')
        ->with('kegiatans', $kegiatans)
        ->with('peran_id', $id_peran);
    }


}
