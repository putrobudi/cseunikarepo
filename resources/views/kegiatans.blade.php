@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Kegiatan yang perlu divalidasi</div>

            <div class="panel-body">
                
                @if(count($kegiatans))
                        <ul class="list-group">
                        @foreach($kegiatans as $kegiatan)
                            <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>
                        @endforeach
                        </ul>
                @else
                    <h3>Tidak ada kegiatan untuk diproses.</h3>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
