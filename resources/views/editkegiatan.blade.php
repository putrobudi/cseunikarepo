@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                @if ($kegiatan->Jenis_Bukti == 'Proposal' && $kegiatan->Kevalidan == 'Valid')
                    Upload LPJ Kegiatan "{{$kegiatan->Judul}}"
                @else
                    Edit Kegiatan
                @endif
                     
                @if($kegiatan->Status == 'HMPSSI')
                <a href="/hmpssi" class="pull-right btn btn-default btn-xs">Kembali</a>
                @elseif($kegiatan->Status == 'BEM')
                <a href="/bem" class="pull-right btn btn-default btn-xs">Kembali</a>
                @elseif($kegiatan->Status == 'Senat')
                <a href="/senat" class="pull-right btn btn-default btn-xs">Kembali</a>
                @elseif($kegiatan->Status == 'HMPTI')
                <a href="/hmpti" class="pull-right btn btn-default btn-xs">Kembali</a>
                @else
                <a href="/dashboard" class="pull-right btn btn-default btn-xs">Kembali</a>
                @endif
            </div>

            <div class="panel-body">
                @if ($kegiatan->Jenis_Bukti == 'Proposal' && $kegiatan->Kevalidan == 'Valid')
                    {!! Form::open(['action' => ['KegiatanController@updateLPJ', $kegiatan->id], 'method' => 'POST']) !!}
                        {{-- {{ Form::bsText('Judul', $kegiatan->Judul, ['readonly' => 'true']) }} I'm gonna use ul just like in show blade --}}
                        {{ Form::bsText('Bukti', '', ['placeholder' => 'Upload LPJ']) }}
                        {{ Form::bsText('Foto', '', ['placeholder' => 'Foto Aktivitas']) }}
                        {{ Form::hidden('_method', 'PATCH') }}
                        {{ Form::bsSubmit('Submit LPJ', ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}
                @else
                    {!! Form::open(['action' => ['KegiatanController@update', $kegiatan->id], 'method' => 'POST']) !!}
                    {{ Form::bsText('Judul', $kegiatan->Judul, ['placeholder' => 'Judul kegiatan']) }}
                    {{ Form::bsDate('Tanggal', $kegiatan->Tanggal, ['placeholder' => 'Tanggal kegiatan dilakukan']) }}
                    {{ Form::bsTextArea('Deskripsi', $kegiatan->Deskripsi, ['placeholder' => 'Tentang Kegiatan']) }}
                    @if ($kegiatan->Jenis_Bukti == 'Proposal')
                        {{ Form::bsText('Bukti', $kegiatan->Bukti, ['placeholder' => 'Proposal']) }}    
                    @else
                        {{ Form::bsText('Bukti', $kegiatan->Bukti, ['placeholder' => 'Sertifikat, Surat Sah']) }}    
                    @endif
                    @if($kegiatan->Jenis_Bukti == 'SK')
                        {{ Form::bsText('Foto', $kegiatan->Foto, ['placeholder' => 'Foto Aktivitas']) }}
                    @endif
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}
                @endif
                
            </div>
        </div>
    </div>
</div>

@endsection