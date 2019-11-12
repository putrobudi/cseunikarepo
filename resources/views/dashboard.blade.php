@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">

            @if($peran_id == 8 || $peran_id == 9 || $peran_id == 10)
            <div class="panel-heading">Dashboard</div>


            <div class="panel-body">






                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a data-toggle="tab" href="#to_validate">Kegiatan yang butuh divalidasi</a></li>
                    <li><a data-toggle="tab" href="#validated">Kegiatan tervalidasi</a></li>
                    <li><a data-toggle="tab" href="#invalid">Kegiatan Invalid</a></li>
                </ul>
                <div class="tab-content">
                    <div id="to_validate" class="tab-pane fade in active">

                        <h3>Kegiatan yang butuh divalidasi</h3>

                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                            Collapsible Group 1</a>
                                    </h4>
                                </div>
                                <div id="collapse1" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                            Collapsible Group 2</a>
                                    </h4>
                                </div>
                                <div id="collapse2" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                            Collapsible Group 3</a>
                                    </h4>
                                </div>
                                <div id="collapse3" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                        </div>


                        @if(count($kegiatans))
                        <ul class="list-group">
                            @foreach($kegiatans as $kegiatan)
                            @if($kegiatan->Kevalidan == 'Menunggu validasi')
                            <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <h3>Tidak ada kegiatan untuk diproses.</h3>
                        @endif
                    </div>
                    <div id="validated" class="tab-pane fade">
                        <h3>Kegiatan sudah divalidasi</h3>

                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                            Collapsible Group 1</a>
                                    </h4>
                                </div>
                                <div id="collapse4" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                            Collapsible Group 2</a>
                                    </h4>
                                </div>
                                <div id="collapse5" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                            Collapsible Group 3</a>
                                    </h4>
                                </div>
                                <div id="collapse6" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                        </div>

                        @if(count($kegiatans))
                        <ul class="list-group">
                            @foreach($kegiatans as $kegiatan)
                            @if($kegiatan->Kevalidan == 'Valid')
                            <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <h3>Tidak ada kegiatan untuk diproses.</h3>
                        @endif
                    </div>
                    <div id="invalid" class="tab-pane fade">
                        <h3>Kegiatan invalid</h3>

                        <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                            Collapsible Group 1</a>
                                    </h4>
                                </div>
                                <div id="collapse7" class="panel-collapse collapse in">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                            Collapsible Group 2</a>
                                    </h4>
                                </div>
                                <div id="collapse8" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                            Collapsible Group 3</a>
                                    </h4>
                                </div>
                                <div id="collapse9" class="panel-collapse collapse">
                                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                        commodo consequat.</div>
                                </div>
                            </div>
                        </div>



                        @if(count($kegiatans))
                        <ul class="list-group">
                            @foreach($kegiatans as $kegiatan)
                            @if($kegiatan->Kevalidan == 'Invalid')
                            <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>
                            @endif
                            @endforeach
                        </ul>
                        @else
                        <h3>Tidak ada kegiatan untuk diproses.</h3>
                        @endif
                    </div>
                </div>





                @else
                <div class="panel-heading">Dashboard <span class="pull-right"><a href="/kegiatans/create" class="btn btn-success btn-xs">Upload Kegiatan</a></span></div>
                <div class="panel-body">
                    <h3>Kegiatanmu</h3>

                    @if(count($kegiatans))

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a data-toggle="tab" href="#to_validate">Kegiatan menunggu divalidasi</a></li>
                        <li><a data-toggle="tab" href="#validated">Kegiatan tervalidasi</a></li>
                        <li><a data-toggle="tab" href="#invalid">Kegiatan invalid</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="to_validate" class="tab-pane fade in active">

                            @if(count($kegiatans))
                            <table class="table table-striped">
                                @foreach($kegiatans as $kegiatan)
                                <tr>

                                    @if($kegiatan->Kevalidan == 'Menunggu validasi')
                                    <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                    <td><a class="pull-right btn btn-default" href="/kegiatans/{{$kegiatan->id}}/edit">Edit</a></td>
                                    <td>
                                        {!! Form::open(['action' => ['KegiatanController@destroy', $kegiatan->id], 'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                                        {{ Form::hidden('_method', 'DELETE') }}
                                        {{ Form::bsSubmit('Delete', ['class' => 'btn btn-danger']) }}
                                        {!! Form::close() !!}
                                    </td>
                                    @endif

                                </tr>
                                @endforeach
                            </table>

                            @else
                            <h3>Tidak ada kegiatan untuk diproses.</h3>
                            @endif
                        </div>

                        <div id="validated" class="tab-pane fade">

                            @if(count($kegiatans))
                            <table class="table table-striped">
                                @foreach($kegiatans as $kegiatan)
                                <tr>

                                    @if($kegiatan->Kevalidan == 'Valid')
                                    <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                    @endif

                                </tr>
                                @endforeach
                            </table>

                            @else
                            <h3>Tidak ada kegiatan untuk diproses.</h3>
                            @endif
                        </div>

                        <div id="invalid" class="tab-pane fade">

                            @if(count($kegiatans))
                            <table class="table table-striped">
                                @foreach($kegiatans as $kegiatan)
                                <tr>

                                    @if($kegiatan->Kevalidan == 'Invalid')
                                    <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                    @endif

                                </tr>
                                @endforeach
                            </table>

                            @else
                            <h3>Tidak ada kegiatan untuk diproses.</h3>
                            @endif
                        </div>
                    </div>


                    @endif
                    <!--endif count-->
                    @endif
                    <!--// endif dosen or mahasiswa-->

                </div>
            </div>
        </div>
    </div>

    @endsection