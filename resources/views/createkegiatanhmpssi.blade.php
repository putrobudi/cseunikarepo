@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Upload Kegiatan<a href="/hmpssi" class="pull-right btn btn-default btn-xs">Kembali</a></div>

            <div class="panel-body">
                {!! Form::open(['action' => 'KegiatanController@store', 'method' => 'POST']) !!}
                    {{ Form::bsText('Judul', '', ['placeholder' => 'Judul kegiatan']) }}
                    {{ Form::bsDate('Tanggal', '', ['placeholder' => 'Tanggal kegiatan dilakukan']) }}
                    {{ Form::bsTextArea('Deskripsi', '', ['placeholder' => 'Tentang Kegiatan']) }}
                    {{ Form::bsText('Bukti', '', ['placeholder' => 'Proposal']) }}
                    {{ Form::hidden('Jenis_Bukti', 'Proposal')}}
                    {{ Form::hidden('Status', 'HMPSSI')}}
                  <!--  {{ Form::bsText('Kevalidan', '', ['placeholder' => '0 = Invalid; 1=Valid']) }} -->
                    {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@endsection