
@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="col s8">
			<h1 class="section-title" id="services">
				<span>Ver Requerimiento</span>
			</h1><!-- End Title -->
		</div>

		<div class="col s8">
			<!--breadcrum start-->
			<ol class="breadcrumb text-left">
			<li><a href="/tickets">Requerimientos</a></li>
			<li class="active">N° {{ $ticket->id }}</li>
			</ol><!--breadcrum end-->
		</div>

		<div class="section" id="inbox"> 
			<!-- section content start-->
			<div class="section-inner">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
						<div class="mailbox">
							<div class="card-panel">
								<form action="/tickets/edit/{{ $ticket->id }}" method="POST">
                                    {{ csrf_field() }}
									<div class="row">
									<br>
										<div class="col s6">
											<p>Descripción : </p>
										</div>
										<div class="col s6">
											<p class="right-align">Fecha Ingreso : {{ $ticket->created_at }}</p>
										</div>
									</div>
									<hr>
									<p>{!! nl2br($ticket->body) !!}</p>
									<hr>
									<div class="row">
										<div class="col s4">
											<p>Estado : {{ $ticket->currentStatus() }}</p>
										</div>
										<div class="col s4 center-align">
											@if (auth()->user()->hasRole('ticketAdmin')) 
											<select name="area" class="browser-default center-align" required>
													<option value="" disabled>Área</option>
													@foreach($areas as $area)
														<option value="{{ $area->id }}" @if ($area->id == $ticket->area->id) selected @endif>
															{{ $area->name }} 
														</option>
													@endforeach
											</select>
											@else
												Área: {{ $ticket->area->name }}
											@endif
										</div>
										<div class="col s4">
											<select name="progress" class="browser-default center-align" required>	
												@for ($i = 0; $i <= 100; $i+=10)
													<option value="{{ $i }}" @if ($i == $ticket->progress) selected @endif>{{ $i }}%</option>	
												@endfor
											</select>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="input-field col s12">
											<textarea name="solution" id="solution" class="materialize-textarea" value="{{ $ticket->solution }}"></textarea>
											<label for="solution">Solucion</label>
										</div>
									</div>
									<div class="row">	
										<div class="input-field col s12">
											<textarea name="comment" id="comment" class="materialize-textarea"></textarea>
											<label for="comment">Comentario</label>
										</div>
									</div>
									@if (auth()->user()->hasRole('ticketAdmin')) 
									<div class="row">	
										<div class="input-field col s12">
											<div id="app">
												<assign-user></assign-user>
											</div>
										</div>
									</div>
									@endif
									@if (!$ticket->attachments->isEmpty())
										<hr>Archivo(s) Adjunto(s) : 
										@foreach($ticket->attachments as $attachment)
											<a href="/{{ $attachment->filepath }}" target="_blank">{{ $attachment->filename }}</a><br>
										@endforeach
									@endif
									<div class="center-align">
										<button class="waves-effect waves-light btn blue lighten-1" type="submit">
											<i class="material-icons left">save</i>Guardar Cambios
										</button>
									</div>
								</form>
							</div>
							<h1>Historial</h1>
                            <div class="card-panel">
								<table class="highlight">
									<thead>
										<tr>
											<th>Estado</th>
											<th>Fecha</th>
										</tr>
									</thead>
									<tbody>
										@foreach($ticket->histories as $history)
											<tr>
												<td>{{ $history->status->name }}</td>
												<td>{{ $history->created_at }}</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<h1>Comentarios</h1>
                            <div class="card-panel">
								<table class="highlight">
									<thead>
										<tr>
											<th>Usuario</th>
											<th>Comentario</th>
											<th>Fecha</th>
										</tr>
									</thead>
										<tbody>
										@forelse($ticket->comments as $comment)
											<tr>
												<td>{{ $comment->user->name }}</td>
												<td>{{ $comment->body }}</td>
												<td>{{ $comment->created_at }}</td>
											</tr>
										@empty
											<tr>
												<td colspan=3 class="center-align">Aún no hay comentarios</td>
											</tr>
										@endforelse
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
		@include('layouts.errors')
	</div><!-- tab end -->
@endsection