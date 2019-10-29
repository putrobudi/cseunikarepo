@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{$kegiatan->Judul}} <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a></div>

            <div class="panel-body">
              <ul class="list-group">
                <li class="list-group-item">Mahasiswa: {{$siswa->nama}}</li>
                <li class="list-group-item">NIM: {{$siswa->nim}}</li>
                <li class="list-group-item">Tanggal: {{$kegiatan->Tanggal}}</li>
                <li class="list-group-item">Bukti: {{$kegiatan->Bukti}}</li>
                <li class="list-group-item">Foto: {{$kegiatan->Foto}}</li>
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
                  {!! Form::open(['action' => ['KegiatanController@updateValidasi', $kegiatan->id], 'method' => 'POST']) !!}
                        {{ Form::bsSubmit('Validasi', ['class' => 'btn btn-primary']) }}
                  {!! Form::close() !!}
                @endif
              @endif
                
            </div>
        </div>
    </div>
</div>

@endsection