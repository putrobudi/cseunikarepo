@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Upload Kegiatan<a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a></div>

            <div class="panel-body">
                {!! Form::open(['action' => 'KegiatanController@store', 'method' => 'POST',  'files' => true]) !!}
                    {{ Form::bsText('Judul', '', ['placeholder' => 'Judul kegiatan']) }}
                    {{ Form::bsDate('Tanggal', '', ['placeholder' => 'Tanggal kegiatan dilakukan']) }}
                    {{ Form::bsTextArea('Deskripsi', '', ['placeholder' => 'Tentang Kegiatan']) }}
                    
                    {{ Form::label('SK', 'Upload Bukti(Sertifikat, Surat Keterangan...):') }}
                    {{ Form::file('Bukti') }} 

                    <br>

                    {{ Form::label('photokegiatan', 'Upload Foto Aktivitas Kegiatan:') }}
                    {{ Form::file('photokegiatan') }}

                    <br>

                   {{--  {{ Form::bsText('Foto', '', ['placeholder' => 'Foto Aktivitas']) }} --}}
                    {{ Form::hidden('Jenis_Bukti', 'SK')}}
                    {{ Form::hidden('Status', 'Individu')}}
                    {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection