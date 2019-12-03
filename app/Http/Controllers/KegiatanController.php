<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\User;
use App\Siswa;
use storage;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$kegiatans = Kegiatan::orderBy('created_at', 'desc')->get();
        return view('kegiatans')->with('kegiatans', $kegiatans);*/
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('createkegiatan');
    }

    public function createHMPSSI(){

        //return 123;
        return view('createkegiatanhmpssi');
    }

    public function createBEM(){
        return view('createkegiatanbem');
    }

    public function createSENAT(){
        return view('createkegiatansenat');
    }

    public function createHMPTI(){
        return view('createkegiatanhmpti');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'Judul' => 'required',
            'Tanggal' => 'required',
            'Deskripsi' => 'required',
            'Bukti' => 'required'
        ]);


       //return 123;
       $kegiatan = new Kegiatan;
       $kegiatan->Judul = $request->input('Judul');
       $kegiatan->Tanggal = $request->input('Tanggal');
       $kegiatan->Deskripsi = $request->input('Deskripsi');
       $kegiatan->Bukti = $request->input('Bukti');
       $kegiatan->Foto = $request->input('Foto');
       $kegiatan->Jenis_Bukti = $request->input('Jenis_Bukti');
       $kegiatan->Status = $request->input('Status');
       $kegiatan->user_id = auth()->user()->id;

       $kegiatan->save();

       if ($kegiatan->Status == 'HMPSSI') {
           return redirect('/hmpssi');
       }
       elseif ($kegiatan->Status == 'BEM' ) {
           return redirect('/bem');
       }
       elseif ($kegiatan->Status == 'Senat') {
           return redirect('/senat');
       }
       elseif ($kegiatan->Status == 'HMPTI') {
           return redirect('/hmpti');
       }
       else {
           return redirect('/dashboard')->with('success', 'Kegiatan berhasil diajukan'); 
       }
       
       
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        //$user = User::find($kegiatan->user_id);

        /*$siswas = Siswa::all();

        foreach($siswas as $siswa){
            echo $siswa->nim;
        }*/

        $user_id = auth()->user()->id; 
        $user = User::find($user_id);
        $id_peran = $user->id_peran;

        $siswas = Siswa::where('user_id', $kegiatan->user_id)->get();

        foreach($siswas as $siswa){
            
        }

        
        return view('showkegiatan')->with('kegiatan', $kegiatan)->with('siswa', $siswa)->with('peran_id', $id_peran);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('editkegiatan')->with('kegiatan', $kegiatan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'Judul' => 'required',
            'Tanggal' => 'required',
            'Deskripsi' => 'required',
            'Bukti' => 'required'
        ]);
      
       $kegiatan = Kegiatan::find($id);
       $kegiatan->Judul = $request->input('Judul');
       $kegiatan->Tanggal = $request->input('Tanggal');
       $kegiatan->Deskripsi = $request->input('Deskripsi');
       $kegiatan->Bukti = $request->input('Bukti');
       $kegiatan->Foto = $request->input('Foto');
       $kegiatan->user_id = auth()->user()->id;
       

       $kegiatan->save();
        if ($kegiatan->Status == 'HMPSSI') {
            return redirect('/hmpssi');
        } elseif ($kegiatan->Status == 'BEM') {
            return redirect('/bem');
        } elseif ($kegiatan->Status == 'Senat') {
            return redirect('/senat');
        } elseif ($kegiatan->Status == 'HMPTI') {
            return redirect('/hmpti');
        } else {
            return redirect('/dashboard')->with('success', 'Update kegiatan berhasil diajukan');
        }

    }

    public function updateLPJ(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);

        $kegiatan->Bukti = $request->input('Bukti');
        $kegiatan->Foto = $request->input('Foto');
        $kegiatan->Jenis_Bukti = 'LPJ';
        //Let's see if different user but of member organisasi update this, it will also change that the kegiatan now is 
        // his or her.
        $kegiatan->user_id = auth()->user()->id;

        $kegiatan->save();

        if ($kegiatan->Status == 'HMPSSI') 
            return redirect('/hmpssi')->with('success', 'Upload LPJ berhasil dilakukan. Kegiatan sudah masuk arsip');
        elseif ($kegiatan->Status == 'BEM')
            return redirect('/bem')->with('success', 'Upload LPJ berhasil dilakukan. Kegiatan sudah masuk arsip');
        elseif ($kegiatan->Status == 'Senat')
            return redirect('/senat')->with('success', 'Upload LPJ berhasil dilakukan. Kegiatan sudah masuk arsip');
        elseif ($kegiatan->Status == 'HMPTI')
            return redirect('/hmpti')->with('success', 'Upload LPJ berhasil dilakukan. Kegiatan sudah masuk arsip');

    }

    public function updateValidasi(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id); 
        
        $kegiatan->Kevalidan = $request->input('Kevalidan');

        $kegiatan->save();
        if($kegiatan->Kevalidan == 'Valid')
            return redirect('/dashboard')->with('success', 'Kegiatan '.$kegiatan->Judul. ' berhasil divalidasi');
        else
            return redirect('/dashboard')->with('success', 'Kegiatan '.$kegiatan->Judul. ' berhasil diinvalidasi');

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();
        if (url()->previous() == 'http://cseunikarepo.io/hmpssi') {
            return redirect('/hmpssi')->with('success', 'Kegiatan berhasil dihapus');
        }elseif (url()->previous() == 'http://cseunikarepo.io/bem'){
            return redirect('/bem')->with('success', 'Kegiatan berhasil dihapus');
        }elseif (url()->previous() == 'http://cseunikarepo.io/senat'){
            return redirect('/senat')->with('success', 'Kegiatan berhasil dihapus');
        }elseif (url()->previous() == 'http://cseunikarepo.io/hmpti'){
            return redirect('/hmpti')->with('success', 'Kegiatan berhasil dihapus');
        }else{
             return redirect('/dashboard')->with('success', 'Kegiatan berhasil dihapus');
        }
       
        
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
}
