<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kegiatan;
use App\User;
use App\Siswa;

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
            'Bukti' => 'required',
            'Foto' => 'required'
        ]);
       //return 123;
       $kegiatan = new Kegiatan;
       $kegiatan->Judul = $request->input('Judul');
       $kegiatan->Tanggal = $request->input('Tanggal');
       $kegiatan->Deskripsi = $request->input('Deskripsi');
       $kegiatan->Bukti = $request->input('Bukti');
       $kegiatan->Foto = $request->input('Foto');
       $kegiatan->user_id = auth()->user()->id;

       $kegiatan->save();
       return redirect('/dashboard')->with('success', 'Kegiatan berhasil diajukan');
       
       
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
            'Bukti' => 'required',
            'Foto' => 'required'
        ]);
      
       $kegiatan = Kegiatan::find($id);
       $kegiatan->Judul = $request->input('Judul');
       $kegiatan->Tanggal = $request->input('Tanggal');
       $kegiatan->Deskripsi = $request->input('Deskripsi');
       $kegiatan->Bukti = $request->input('Bukti');
       $kegiatan->Foto = $request->input('Foto');
       $kegiatan->user_id = auth()->user()->id;
       

       $kegiatan->save();
       return redirect('/dashboard')->with('success', 'Update kegiatan berhasil diajukan');
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
        return redirect('/dashboard')->with('success', 'Kegiatan berhasil dihapus');
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
}
