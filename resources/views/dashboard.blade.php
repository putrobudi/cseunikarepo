@extends('layouts.app')

@section('content')



    <h1 align="center">Dashboard</h1>
   
    @if($peran_id == 10)
    <p align="center">
        Selamat datang Kaprogdi
    </p>
    @elseif($peran_id == 9)
    <p align="center">
        Selamat datang Dekan
    </p>
    @elseif($peran_id == 8)
    <p align="center">
        Selamat datang dosen
    </p>
    @else
    <p align="center">
        Selamat datang di dashboard kegiatanmu
    </p>
    @endif

    @if($peran_id == 10)
    <ul class="nav nav-pills">
        <li class="active"><a data-toggle="pill" href="#individu">Individu</a></li>
        <li><a data-toggle="pill" href="#hmpssi">HMPSSI</a></li>
    </ul>
    <div class="tab-content">
        <div id="individu" class="tab-pane fade in active">
       
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-primary">

                            
                        <div class="panel-heading">Kegiatan mahasiswa individu</div>

                            <div class="panel-body">

                                <ul class="nav nav-tabs nav-justified" id="myTab">
                                    <li class="active"><a data-toggle="tab" href="#to_validate">Kegiatan yang butuh divalidasi</a></li>
                                    <li><a data-toggle="tab" href="#validated">Kegiatan tervalidasi</a></li>
                                    <li><a data-toggle="tab" href="#invalid">Kegiatan Invalid</a></li>
                                </ul>
                                    
                                    <div class="tab-content"> <!-- dosen -->
                                        <!-- Tab Kegiatan Menunggu Validasi -->
                                        <div id="to_validate" class="tab-pane fade in active">

                                            <h3>Mahasiswa</h3>

                                            <!-- Test get siswa and collapsible accordion loop -->

                                            @if(count($siswas))

                                            

                                                <!-- Test Print siswa sekalian define variable $siswa
                                                    @foreach($siswas as $siswa)

                                                        <li class="list-group-item">{{$siswa->nama}}</li> 

                                                    @endforeach 
                                                -->

                                                <!--  To define how many loops manually. I changed to foreach below
                                                @php
                                                $jumlah = count($siswas)
                                                @endphp
                                                -->

                                                <!-- accordion loop part -->

                                                <div class="panel-group" id="accordion">

                                                    @php
                                                        $jumlah_siswa = count($siswas);
                                                        $row_count = 1;
                                                        $hidden = false;
                                                        $tanpa_kegiatan = 0;

                                                    @endphp

                                                    @foreach($siswas as $siswa)
                                                        <!-- 
                                                            Mungkin di sini dikasih if untuk tidak menampilkan siswa yang tidak memiliki kegiatan 
                                                            Sementara muncul siswanya tetapi diberi status gak ada kegiatannya.
                                                        -->


                                                        <div class="panel panel-default" id="test{{$row_count}}">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$row_count}}">
                                                                        {{$siswa->nama}}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse{{$row_count}}" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    @if(count($kegiatans))
                                                                    <ul class="list-group">
                                                                        @php
                                                                            // variable $i ngecek jumlah kegiatan siswa terkait
                                                                            $i = 0;
                                                                        @endphp
                                                                        @foreach($kegiatans as $kegiatan)
                                                                            @if($kegiatan->Kevalidan == 'Menunggu validasi')
                                                                                @if($kegiatan->user_id == $siswa->user_id)
                                                                                    @php
                                                                                        $i++;
                                                                                    @endphp
                                                                                    <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>  
                                                                                       
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        
                                                                      <!--   {{$i}}
                                                                        &nbsp
                                                                        {{$row_count}}  -->
                                                                        
                                                                       
                                                                        @if($i == 0)
                                                                            @php
                                                                                $tanpa_kegiatan++;
                                                                            @endphp
                                                                            <script>
                                                                                var x = document.getElementById("test{{$row_count}}");
                                                                                if (x.style.display === "none") {
                                                                                    x.style.display = "block";
                                                                                } else {
                                                                                    x.style.display = "none";
                                                                                }
                                                                            </script>
                                                                            @php
                                                                                $hidden = true;
                                                                            @endphp
                                                                        @endif
                                                                    </ul>
                                                                    @else
                                                                        <h3>Tidak ada kegiatan untuk diproses.</h3>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>

                                                        @php
                                                            //echo $row_count;
                                                            $row_count++;
                                                        @endphp



                                                    @endforeach

                                                </div> <!-- end div accordion panel-group -->
                                                <!-- {{$jumlah_siswa}}
                                                {{$tanpa_kegiatan}} -->
                                                @if($hidden == true && $tanpa_kegiatan == $jumlah_siswa)
                                                    <h5>Tidak ada mahasiswa anda yang membutuhkan kegiatan untuk divalidasi.</h5>
                                                @endif

                                            @else
                                                <h3>Anda tidak memiliki mahasiswa untuk diwalikan.</h3>
                                            @endif
                                            

                                        </div>

                                        <!-- End of Test -->


                                        <!-- Tab kegiatan tervalidasi -->
                                        <div id="validated" class="tab-pane fade">
                                            <h3>Mahasiswa</h3>

                                            

                                            @if(count($siswas))
                                                <!-- accordion loop part -->
                                                <div class="panel-group" id="accordion2">

                                                    

                                                    @php
                                                      
                                                        $row_count = $row_count + 1;
                                                        $hidden = false;
                                                        $tanpa_kegiatan = 0;
                                                        

                                                    @endphp

                                                    

                                                    @foreach($siswas as $siswa)
                                                    
                                                  
                                                        <div class="panel panel-default" id="test{{$row_count}}">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion2" href="#collapse{{$row_count}}">
                                                                        {{$siswa->nama}}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse{{$row_count}}" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    @if(count($kegiatans))
                                                                    <ul class="list-group">
                                                                        @php
                                                                            $i = 0;
                                                                        @endphp
                                                                        @foreach($kegiatans as $kegiatan)
                                                                            @if($kegiatan->Kevalidan == 'Valid')
                                                                                @if($kegiatan->user_id == $siswa->user_id)
                                                                                    @php
                                                                                        $i++;
                                                                                    @endphp
                                                                                    <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>    
                                                                                @endif
                                                                            @endif
                                                                        @endforeach
                                                                        @if($i == 0)
                                                                            @php
                                                                                $tanpa_kegiatan++;
                                                                            @endphp
                                                                            <script>
                                                                                var x = document.getElementById("test{{$row_count}}");
                                                                                if (x.style.display === "none"){
                                                                                    x.style.display = "block";
                                                                                } else {
                                                                                    x.style.display = "none";
                                                                                }
                                                                            </script>
                                                                            @php
                                                                                $hidden = true;
                                                                            @endphp
                                                                        @endif
                                                                    </ul>
                                                                    @else
                                                                        <h3>Tidak ada kegiatan untuk diproses.</h3>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $row_count++;
                                                        @endphp



                                                    @endforeach

                                                </div> <!-- end div accordion panel-group -->
                                                @if($hidden == true && $tanpa_kegiatan == $jumlah_siswa)
                                                    <h5>Tidak ada mahasiswa anda yang memiliki kegiatan tervalidasi</h5>
                                                @endif

                                            @else
                                                <h3>Anda tidak memiliki mahasiswa untuk diwalikan</h3>
                                            @endif

                                        </div> <!-- end div tab kegiatan valid -->

                                        <!-- Tab Kegiatan invalid -->
                                        <div id="invalid" class="tab-pane fade">
                                            <h3>Mahasiswa</h3>

                                            @if(count($siswas))
                                                <!-- accordion loop part -->
                                                <div class="panel-group" id="accordion3">

                                                    @php
                                                        $row_count = $row_count + 1;
                                                        $hidden = false;
                                                        $tanpa_kegiatan = 0;
                                                    @endphp

                                                    @foreach($siswas as $siswa)
                                                        <div class="panel panel-default" id="test{{$row_count}}">
                                                            <div class="panel-heading">
                                                                <h4 class="panel-title">
                                                                    <a data-toggle="collapse" data-parent="#accordion3" href="#collapse{{$row_count}}">
                                                                        {{$siswa->nama}}
                                                                    </a>
                                                                </h4>
                                                            </div>
                                                            <div id="collapse{{$row_count}}" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    @if(count($kegiatans))
                                                                    <ul class="list-group">
                                                                        @php
                                                                            $i = 0;
                                                                        @endphp
                                                                        @foreach($kegiatans as $kegiatan)
                                                                            @if($kegiatan->Kevalidan == 'Invalid')
                                                                                @if($kegiatan->user_id == $siswa->user_id)
                                                                                    @php
                                                                                        $i++;
                                                                                    @endphp
                                                                                    <li class="list-group-item"><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></li>
                                                                                @endif    
                                                                            @endif
                                                                        @endforeach
                                                                        @if($i == 0)
                                                                            @php
                                                                                $tanpa_kegiatan++;
                                                                            @endphp
                                                                            <script>
                                                                                var x = document.getElementById("test{{$row_count}}");
                                                                                if (x.style.display === "none") {
                                                                                    x.style.display = "block";
                                                                                } else {
                                                                                    x.style.display = "none";
                                                                                }
                                                                            </script>
                                                                            @php
                                                                                $hidden = true;
                                                                            @endphp
                                                                        @endif
                                                                    </ul>
                                                                    @else
                                                                        <h3>Tidak ada kegiatan untuk diproses.</h3>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @php
                                                            $row_count++;
                                                        @endphp


                                                    @endforeach


                                                </div> <!-- end div accordion panel-group -->
                                                @if($hidden == true && $tanpa_kegiatan == $jumlah_siswa)
                                                    <h5>Tidak ada mahasiswa anda yang kegiatannya invalid</h5>
                                                @endif

                                            @else
                                                <h3>Anda tidak memiliki mahasiswa untuk diwalikan</h3>
                                            @endif


                                                        

                                        </div> <!-- end div tab kegiatan invalid -->

                                    </div> <!-- end div "tab-content dosen" -->

                            </div> <!-- end panel body individu kaprogdi -->

                    </div> <!-- end panel primary individu kaprogdi -->

                </div> <!-- end panel col individu kaprogdi -->

            </div> <!-- end class row individu kaprogdi -->


        </div> <!-- end div id individu kaprogdi -->

        <div id="hmpssi" class="tab-pane fade">
            
            <div class="row">
                <div class="col-md-12 col-md-offset-0">
                    <div class="panel panel-primary">

                            
                        <div class="panel-heading">Rencana Kegiatan HMPSSI</div>

                            <div class="panel-body">

                                <ul class="nav nav-tabs nav-justified" id="myTabHMPSSI">
                                    <li class="active"><a data-toggle="tab" href="#to_validateHMPSSI">Rencana Kegiatan yang butuh divalidasi</a></li>
                                    <li><a data-toggle="tab" href="#validatedHMPSSI">Rencana Kegiatan tervalidasi</a></li>
                                    <li><a data-toggle="tab" href="#invalidHMPSSI">Rencana Kegiatan Invalid</a></li>
                                </ul>
                                    
                                    <div class="tab-content"> <!-- dosen -->
                                        <!-- Tab Kegiatan Menunggu Validasi -->
                                        <div id="to_validateHMPSSI" class="tab-pane fade in active">
                                            @if(count($kegiatans_hmpssi))
                                                @php
                                                    $i = 0;
                                                @endphp
                                                <table class="table table-striped">
                                                    @foreach($kegiatans_hmpssi as $kegiatan)
                                                        <tr>
                                                            @if($kegiatan->Kevalidan == 'Menunggu validasi')
                                                                @php
                                                                    $i++;                   
                                                                @endphp
                                                                <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                                                
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                @if($i == 0)
                                                    <h3>Tidak ada kegiatan HMPSSI yang butuh divalidasi</h3>
                                                @endif
                                            @else
                                                <h3>Tidak ada kegiatan ditemukan</h3>   
                                            @endif
                                              
                                        </div>


                                        <!-- Tab kegiatan tervalidasi -->
                                        <div id="validatedHMPSSI" class="tab-pane fade">
                                            @if(count($kegiatans_hmpssi))
                                                @php
                                                    $i = 0;
                                                @endphp
                                                <table class="table table-striped">
                                                    @foreach($kegiatans_hmpssi as $kegiatan)
                                                        <tr>
                                                            @if($kegiatan->Kevalidan == 'Valid')
                                                                @php
                                                                    $i++;                   
                                                                @endphp
                                                                <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                @if($i == 0)
                                                    <h3>Tidak ada kegiatan HMPSSI valid ditemukan</h3>
                                                @endif
                                            @else
                                                <h3>Tidak ada kegiatan ditemukan</h3>   
                                            @endif
                                            
                                        </div> <!-- end div tab kegiatan valid -->

                                        <!-- Tab Kegiatan invalid -->
                                        <div id="invalidHMPSSI" class="tab-pane fade">
                                            @if(count($kegiatans_hmpssi))
                                                @php
                                                    $i = 0;
                                                @endphp
                                                <table class="table table-striped">
                                                    @foreach($kegiatans_hmpssi as $kegiatan)
                                                        <tr>
                                                            @if($kegiatan->Kevalidan == 'Invalid')
                                                                @php
                                                                    $i++;                   
                                                                @endphp
                                                                <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </table>
                                                @if($i == 0)
                                                    <h3>Tidak ada kegiatan HMPSSI invalid yang ditemukan</h3>
                                                @endif
                                            @else
                                                <h3>Tidak ada kegiatan ditemukan</h3>   
                                            @endif          

                                        </div> <!-- end div tab kegiatan invalid -->

                                    </div> <!-- end div "tab-content dosen" -->

                            </div> <!-- end panel body hmpssi kaprogdi -->

                    </div> <!-- end panel primary hmpssi kaprogdi -->

                </div> <!-- end panel col hmpssi kaprogdi -->

            </div> <!-- end class row hmpsso kaprogdi -->
        
        </div> 
 
    </div> <!-- end div tab content individu and hmpssi -->
    @elseif($peran_id == 9)
    @elseif($peran_id == 8)
    @else

        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-primary">    
                    <div class="panel-heading">
                        <strong>Kegiatanmu</strong>
                        <span class="pull-right"><a href="/kegiatans/create" class="btn btn-success btn-xs">Upload Kegiatan</a></span>
                    </div>
                        <div class="panel-body">
                            <ul class="nav nav-tabs nav-justified" id="myTab">
                                <li class="active"><a data-toggle="tab" href="#to_validate">Kegiatan menunggu divalidasi</a></li>
                                <li><a data-toggle="tab" href="#validated">Kegiatan tervalidasi</a></li>
                                <li><a data-toggle="tab" href="#invalid">Kegiatan invalid</a></li>
                            </ul>
                                
                            <div class="tab-content">
                                <div id="to_validate" class="tab-pane fade in active">

                                    @if(count($kegiatans))
                                    @php
                                        $i = 0;
                                    @endphp
                                    <table class="table table-striped">
                                        @foreach($kegiatans as $kegiatan)
                                        <tr>

                                            @if($kegiatan->Kevalidan == 'Menunggu validasi' && $kegiatan->Status == 'Individu')
                                            @php
                                                $i++;
                                            @endphp
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
                                    @if($i == 0)
                                        <h3>Kamu tidak punya kegiatan untuk divalidasi</h3>
                                    @endif

                                    @else
                                    <h3>Tidak ada kegiatan untuk diproses.</h3>
                                    @endif
                                </div>

                                <div id="validated" class="tab-pane fade">

                                    @if(count($kegiatans))
                                    @php
                                        $i = 0;
                                    @endphp
                                    <table class="table table-striped">
                                        @foreach($kegiatans as $kegiatan)
                                        <tr>

                                            @if($kegiatan->Kevalidan == 'Valid' && $kegiatan->Status == 'Individu')
                                            @php
                                                $i++;
                                            @endphp
                                            <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                            @endif

                                        </tr>
                                        @endforeach
                                    </table>
                                    @if($i == 0)
                                        <h3>Kamu tidak punya kegiatan yang tervalidasi</h3>
                                    @endif
                                    @else
                                    <h3>Tidak ada kegiatan untuk diproses.</h3>
                                    @endif
                                </div>

                                <div id="invalid" class="tab-pane fade">

                                    @if(count($kegiatans))
                                    @php
                                        $i = 0;
                                    @endphp
                                    <table class="table table-striped">
                                        @foreach($kegiatans as $kegiatan)
                                        <tr>

                                            @if($kegiatan->Kevalidan == 'Invalid' && $kegiatan->Status == 'Individu')
                                            @php
                                                $i++;
                                            @endphp
                                            <td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
                                            @endif

                                        </tr>
                                        @endforeach
                                    </table>
                                    @if($i == 0)
                                        <h3>Kamu tidak memiliki kegiatan yang invalid</h3>
                                    @endif
                                    @else
                                    <h3>Tidak ada kegiatan untuk diproses.</h3>
                                    @endif
                                </div>

                            </div> <!-- end div "tab-content" mahasiswa individu -->
                        </div> <!-- end div mahasiswa panel-body -->
                </div> <!-- end div class "panel panel-primary" -->
            </div> <!-- end div class = "col-md-8 col-md-offset-2" -->
        </div> <!-- end div class "row" -->

    @endif

    






    
              

@endsection