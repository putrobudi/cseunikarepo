@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">{{$listing->judul}} <a href="/listings" class="pull-right btn btn-default btn-xs">Go Back</a></div>
                

            <div class="panel-body">
                <ul class="list-group">
                    
                    <li class="list-group-item">Tanggal: {{$listing->tanggal}}</li>
                    <li class="list-group-item">Bukti: {{$listing->bukti}}</li>
                    <li class="list-group-item">Foto: {{$listing->foto}}</li>
                    <li class="list-group-item">Kevalidan: {{$listing->kevalidan}}</li>
                    <li class="list-group-item">Tingkat: {{$listing->tingkat}}</li>
                </ul>
                <hr>
                <div class="well">
                    {{$listing->deskripsi}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection