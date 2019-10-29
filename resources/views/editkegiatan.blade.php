@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Kegiatan <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a></div>

            <div class="panel-body">
                {!! Form::open(['action' => ['KegiatanController@update', $kegiatan->id], 'method' => 'POST']) !!}
                    {{ Form::bsText('Judul', $kegiatan->Judul, ['placeholder' => 'Judul kegiatan']) }}
                    {{ Form::bsDate('Tanggal', $kegiatan->Tanggal, ['placeholder' => 'Tanggal kegiatan dilakukan']) }}
                    {{ Form::bsTextArea('Deskripsi', $kegiatan->Deskripsi, ['placeholder' => 'Tentang Kegiatan']) }}
                    {{ Form::bsText('Bukti', $kegiatan->Bukti, ['placeholder' => 'Sertifikat, Surat Sah']) }}
                    {{ Form::bsText('Foto', $kegiatan->Foto, ['placeholder' => 'Foto Aktivitas']) }}
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection