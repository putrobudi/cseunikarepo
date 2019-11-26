@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit Kegiatan 
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
                {!! Form::open(['action' => ['KegiatanController@update', $kegiatan->id], 'method' => 'POST']) !!}
                    {{ Form::bsText('Judul', $kegiatan->Judul, ['placeholder' => 'Judul kegiatan']) }}
                    {{ Form::bsDate('Tanggal', $kegiatan->Tanggal, ['placeholder' => 'Tanggal kegiatan dilakukan']) }}
                    {{ Form::bsTextArea('Deskripsi', $kegiatan->Deskripsi, ['placeholder' => 'Tentang Kegiatan']) }}
                    {{ Form::bsText('Bukti', $kegiatan->Bukti, ['placeholder' => 'Sertifikat, Surat Sah']) }}
                    @if($kegiatan->Jenis_Bukti == 'SK')
                    {{ Form::bsText('Foto', $kegiatan->Foto, ['placeholder' => 'Foto Aktivitas']) }}
                    @elseif($kegiatan->Jenis_Bukti == 'Proposal')
                        @if($kegiatan->Kevalidan == 'Valid')
                            {{ Form::bsText('Foto', $kegiatan->Foto, ['placeholder' => 'Foto Aktivitas']) }}
                        @endif
                    @elseif($kegiatan->Jenis_Bukti == 'LPJ')
                    {{ Form::bsText('Foto', $kegiatan->Foto, ['placeholder' => 'Foto Aktivitas']) }}
                    @endif
                    {{ Form::hidden('_method', 'PUT') }}
                    {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection