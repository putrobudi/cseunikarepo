<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kegiatan;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function getHome(){
        return view('home');
    }

    public function getHMPSSI(){



        if (Auth::guest()) {

            $id_peran = 2;

            return view('hmpssi')
                ->with('peran_id', $id_peran);
        } else {

            $kegiatans = Kegiatan::where('Status', 'HMPSSI')
                ->orderBy('created_at', 'desc')
                ->get();

            $user_id = auth()->user()->id;
            $user = User::find($user_id);

            $id_peran = $user->id_peran;




            return view('hmpssi')
                ->with('kegiatans', $kegiatans)
                ->with('peran_id', $id_peran);
        }


        
    }

    public function getBEM(){

        if (Auth::guest()) {
            $id_peran = 2;

            return view('bem')
                ->with('peran_id', $id_peran);
        } else {
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

        
    }

    public function getSenat(){

        if (Auth::guest()) {
            $id_peran = 2;

            return view('senat')
                ->with('peran_id', $id_peran);
        } else {
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
    }

    public function getHMPTI(){
        if (Auth::guest()) {
            $id_peran = 2;

            return view('hmpti')
                ->with('peran_id', $id_peran);
        } else {
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


}
