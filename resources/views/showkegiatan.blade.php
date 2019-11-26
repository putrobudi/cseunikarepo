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
                @else
                <li class="list-group-item">Mahasiswa: {{$siswa->nama}}</li>
                <li class="list-group-item">NIM: {{$siswa->nim}}</li>
                @endif
                <li class="list-group-item">Tanggal: {{$kegiatan->Tanggal}}</li>
                <li class="list-group-item">Bukti Proposal: {{$kegiatan->Bukti}}</li>
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