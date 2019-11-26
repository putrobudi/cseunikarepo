@extends('layouts.app')

@section('content')
	<h1 align="center">BEM</h1>
	<p align="center">
	  Selamat datang di laman kegiatan BEM.
	</p>
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-primary">
				@if($peran_id == 4)
					<div class="panel-heading"><strong>Kegiatan BEM</strong><span class="pull-right"><a href="/kegiatans/createkegiatanbem" class="btn btn-success btn-xs">Upload Kegiatan BEM</a></span></div>
					<div class="panel-body">
						<ul class = "nav nav-tabs nav-justified" id="tabHeader">
							<li class="active"><a data-toggle="tab" href="#rencana_kegiatan">Rencana Kegiatan</a></li>
			                <li><a data-toggle="tab" href="#arsip_kegiatan">Arsip Kegiatan</a></li>
						</ul>

						<div class="tab-content">
							<br>
							<div id="rencana_kegiatan" class="tab-pane fade in active">

								<ul class="nav nav-tabs nav-justified" id="tabInside">
									<li class="active"><a data-toggle="tab" href="#to_validate">Rencana kegiatan menunggu divalidasi</a></li>
									<li><a data-toggle="tab" href="#validated">Rencana kegiatan tervalidasi</a></li>
									<li><a data-toggle="tab" href="#invalid">Rencana Kegiatan ditolak</a></li>
								</ul>

								<div class="tab-content">
									<!-- Konten tab menunggu validasi -->
									<div id="to_validate" class="tab-pane fade in active">
										@if(count($kegiatans))
											@php
												$i = 0;
											@endphp
											<table class="table table-striped">
												@foreach($kegiatans as $kegiatan)
													<tr>
														@if($kegiatan->Kevalidan == 'Menunggu validasi')
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
												<h3>Tidak ada kegiatan BEM yang butuh divalidasi</h3>
											@endif
										@else
											<h3>Tidak ada kegiatan ditemukan</h3>	
										@endif
									</div>
									<!-- Konten tab kegiatan tervalidasi -->
									<div id="validated" class="tab-pane fade">
										@if(count($kegiatans))
											@php
												$i = 0;
											@endphp
											<table class="table table-striped">
												@foreach($kegiatans as $kegiatan)
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
												<h3>Tidak ada kegiatan BEM valid ditemukan</h3>
											@endif
										@else
											<h3>Tidak ada kegiatan ditemukan</h3>	
										@endif
									</div>
									<!-- Konten tab invalid -->
									<div id="invalid" class="tab-pane fade">
										@if(count($kegiatans))
											@php
												$i = 0;
											@endphp
											<table class="table table-striped">
												@foreach($kegiatans as $kegiatan)
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
												<h3>Tidak ada kegiatan BEM invalid yang ditemukan</h3>
											@endif
										@else
											<h3>Tidak ada kegiatan ditemukan</h3>	
										@endif
									</div>
								</div>


								
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>	
	
		
	
@endsection