@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            @if($peran_id == 8 || $peran_id == 9 || $peran_id == 10)
            <div class="panel-heading">Dashboard</div>

            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li><a href="#">Kegiatan yang </a></li>
                    <li><a href="#">Kegiatan tervalidasi</a></li>
                    <li><a href="#">Kegiatan invalid</a></li>
                </ul>
                



                @if(count($kegiatans))
                <ul class="list-group">
                    @foreach($kegiatans as $kegiatan)
                    <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>
                    @endforeach
                </ul>
                @else
                <h3>Tidak ada kegiatan untuk diproses.</h3>
                @endif
                @else
                <div class="panel-heading">Dashboard <span class="pull-right"><a href="/kegiatans/create" class="btn btn-success btn-xs">Upload Kegiatan</a></span></div>
                <div class="panel-body">
                    <h3>Kegiatanmu</h3>

                    @if(count($kegiatans))
                    
                    <ul class="nav nav-tabs">
                        <li><a href="#">Kegiatan menunggu divalidasi</a></li>
                        <li><a href="#">Kegiatan tervalidasi</a></li>
                        <li><a href="#">Kegiatan ditolak</a></li>
                    </ul>
                    <table class="table table-striped">
                        <!-- loop through each kegiatan -->
                        @foreach($kegiatans as $kegiatan)
                        <tr>
                            <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                            <td><a class="pull-right btn btn-default" href="/kegiatans/{{$kegiatan->id}}/edit">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['KegiatanController@destroy', $kegiatan->id], 'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
    
@endsection




    <!--mitrais -> java jogja -->