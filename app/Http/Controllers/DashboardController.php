<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Kegiatan;
use App\Dosen;
use App\Siswa;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //this is simply just a provided function
        // from auth that's from laravel
        // authentication implementation
        //return auth()->user()->id; 

       

        $user_id = auth()->user()->id; 
        $user = User::find($user_id);
        
        /* Foreach reference
        $kegiatans = $user->kegiatans;
        echo count($kegiatans);
        foreach($kegiatans as $kegiatan){
            echo $kegiatan->Judul;
        }
        */

        $id_peran = $user->id_peran;

        $dosens = Dosen::where('user_id', $user_id)->get();

        $nid = '';

        foreach($dosens as $dosen){
            $nid = $dosen->nid; 
        }
        

        $siswas = Siswa::where('dosen_id', $nid)->get();
        

        $kegiatans = Kegiatan::where('Status', 'Individu')
        ->orderBy('created_at', 'desc')
        ->get();

        $kegiatans_hmpssi = Kegiatan::where('Status', 'HMPSSI')
        ->orderBy('created_at', 'desc')
        ->get();
        

        /* Peran reference
        echo $id_peran;

        $peran = Peran::find($id_peran);
        echo $peran->peran;
        
        */
        
       
         if($id_peran == 8 || $id_peran == 9 || $id_peran == 10)
            return view('dashboard')->with('kegiatans', $kegiatans)->with('peran_id', $id_peran)
            ->with('siswas', $siswas)->with('dosen', $dosen)
            ->with('kegiatans_hmpssi', $kegiatans_hmpssi);
            
        else
            return view('dashboard')->with('kegiatans', $user->kegiatans)->with('peran_id', $id_peran);

 


    }
}
