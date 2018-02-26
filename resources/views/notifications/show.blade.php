
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
										<p>Área : {{ $ticket->area->name }}</p>
									</div>
									<div class="col s4 right-align">
										<p>Progreso : {{ $ticket->progress }}%</p>
									</div>
								</div>
								<hr>
								<p>Solución : {{ $ticket->solution }}</p>
								@if(!$ticket->attachments->isEmpty())
									<hr>Archivo(s) Adjunto(s) : 
									@foreach($ticket->attachments as $attachment)
										<a href="/{{ $attachment->filepath }}" target="_blank">{{ $attachment->filename }}</a>
									@endforeach
								@endif
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
										@if ($ticket->comments->isEmpty())
											<tr>
												<td colspan=3 class="center-align">Aún no hay comentarios</td>
											</tr>
										@else
											@foreach($ticket->comments as $comment)
											<tr>
												<td>{{ $comment->user->name }}</td>
												<td>{{ $comment->body }}</td>
												<td>{{ $comment->created_at }}</td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
                                <form action="/tickets/comment" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                                    <div class="input-field col s12">
                                        <textarea name="body" id="body" class="materialize-textarea"></textarea>
                                        <label for="body">Nuevo Comentario</label>
                                    </div>
                                    <div class="center-align">
										<button class="waves-effect waves-light btn blue lighten-1" type="submit">
											<i class="material-icons left">save</i>Agregar Comentario
										</button>
									</div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
	</div><!-- tab end -->
@endsection