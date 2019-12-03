@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            
              
          
            <div class="panel-heading">{{$kegiatan->Judul}} 
              @if($kegiatan->Status == 'HMPSSI')
                @if($peran_id == 10)
                  <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a>
                @else
                  <a href="/hmpssi" class="pull-right btn btn-default btn-xs">Kembali</a>
                @endif 
              @elseif($kegiatan->Status == 'BEM')
                @if($peran_id == 9)
                  <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a>  
                @else
                  <a href="/bem" class="pull-right btn btn-default btn-xs">Kembali</a>
                @endif
              @elseif($kegiatan->Status == 'Senat')
                @if($peran_id == 9)
                  <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a>
                @else
                  <a href="/senat" class="pull-right btn btn-default btn-xs">Kembali</a>
                @endif  
              @elseif($kegiatan->Status == 'HMPTI')
                @if($peran_id == 9)
                  <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a>
                @else
                  <a href="/hmpti" class="pull-right btn btn-default btn-xs">Kembali</a>
                @endif
              @else
                <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a>
              @endif
            </div>

            <div class="panel-body">
              <ul class="list-group">
                @if($kegiatan->Status == 'HMPSSI')
                  <li class="list-group-item">Mahasiswa Pengunggah Kegiatan HMPPSI: <br> 
                    Nama: {{$siswa->nama}} <br>
                    NIM: {{$siswa->nim}}
                  </li>
                @elseif($kegiatan->Status == 'BEM')
                  <li class="list-group-item">Mahasiswa Pengunggah Kegiatan BEM IKOM: <br>
                    Nama: {{$siswa->nama}} <br>
                    NIM: {{$siswa->nim}}
                  </li>
                @elseif($kegiatan->Status == 'Senat')
                  <li class="list-group-item">Mahasiswa Pengunggah Kegiatan Senat IKOM: <br>
                    Nama: {{$siswa->nama}} <br>
                    NIM: {{$siswa->nim}}
                  </li>
                @elseif($kegiatan->Status == 'HMPTI')
                  <li class="list-group-item"> Mahasiswa Penggungah Kegiatan HMPTI IKOM: <br>
                    Nama: {{$siswa->nama}} <br>
                    NIM: {{$siswa->nim}}
                  </li>
                @else
                  <li class="list-group-item">Mahasiswa: {{$siswa->nama}}</li>
                  <li class="list-group-item">NIM: {{$siswa->nim}}</li>
                @endif
                  <li class="list-group-item">Tanggal: {{$kegiatan->Tanggal}}</li>
                @if ($kegiatan->Jenis_Bukti == 'Proposal')
                  <li class="list-group-item">Bukti Proposal: {{$kegiatan->Bukti}}</li>  
                @elseif ($kegiatan->Jenis_Bukti == 'LPJ')
                  <li class="list-group-item">LPJ: {{$kegiatan->Bukti}}</li>  
                @else
                  <li class="list-group-item">Bukti: {{$kegiatan->Bukti}}</li>                  
                @endif
                @if($kegiatan->Jenis_Bukti == 'SK' || $kegiatan->Jenis_Bukti == 'LPJ')
                  <li class="list-group-item">Foto: {{$kegiatan->Foto}}</li>
                @endif
              </ul>

              <hr>

              <div class="well">
                {{$kegiatan->Deskripsi}}
              </div>

              <hr>

              <ul class="list-group">
                <li class="list-group-item">Status: {{$kegiatan->Kevalidan}}</li>
              </ul>

              {{-- 
                    Khusus untuk dosen untuk validasi. I know that all dosen regardless of their status 
                    would be able to validate all kegiatan if they decided to access this show.blade 
                    page manually. But I hope they won't and for now, I'm just to lazy to implement the 
                    validation for the appropriate dosen to validate. 
              --}}
              @if($peran_id == 8 || $peran_id == 9 || $peran_id == 10)
                @if($kegiatan->Kevalidan == 'Menunggu validasi')
                  <table width = "200" align = "center">
                    <td>
                      {!! Form::open(['action' => ['KegiatanController@updateValidasi', $kegiatan->id], 'method' => 'POST']) !!}
                        {{ Form::hidden('Kevalidan', 'Valid') }}
                        {{ Form::hidden('_method', 'PATCH') }}
                        {{ Form::bsSubmit('Validasi', ['class' => 'btn btn-primary']) }}
                      {!! Form::close() !!}
                    </td>
                    <td>
                      {!! Form::open(['action' => ['KegiatanController@updateValidasi', $kegiatan->id], 'method' => 'POST']) !!}
                        {{ Form::hidden('Kevalidan', 'Invalid') }}
                        {{ Form::hidden('_method', 'PATCH') }}  
                        {{ Form::bsSubmit('Invalidasi', ['class' => 'btn btn-danger']) }}
                      {!! Form::close() !!}
                    </td>
                  </table>
                  
                @endif
              @endif
                
            </div>
        </div>
    </div>
</div>

@endsection