@extends('layouts.app')

@section('content')
	<h1 align="center">HMPSSI</h1>
	<p align="center">
	  Selamat datang di laman kegiatan HMPSSI.
	</p>
	<div class="row">
		<div class="col-md-12 col-md-offset-0">
			<div class="panel panel-primary">
				@if($peran_id == 5)
					<div class="panel-heading"><strong>Kegiatan HMPSSI</strong><span class="pull-right"><a href="/kegiatans/create" class="btn btn-success btn-xs">Upload Kegiatan HMPSSI</a></span></div>
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
									<div id="to_validate" class="tab-pane fade in active">
										@if(count($kegiatans))
											@php
												$i = 0;
											@endphp
											<table class="table table-striped">
												@foreach($kegiatans as $kegiatan)
													<tr>
														@if($kegiatan->Kevalidan == 'Menunggu Validasi')
															@php
																$i++;					
															@endphp
															<td><a href="/kegiatans/{{$kegiatan->id}}">{{$kegiatan->Judul}}</a></td>
															<td><a class="pull-right btn btn-default" href="/kegiatans/{{$kegiatan->id}}/edit">Edit</a></td>
															<td>
																
															</td>
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
								</div>


								
							</div>
						</div>
					</div>
				@endif
			</div>
		</div>
	</div>	
	
		
	
@endsection