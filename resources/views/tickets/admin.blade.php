@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="row">
			<div class="col s8">
				<h1 class="section-title" id="services">
					<span>Administración de Requerimientos</span>
				</h1><!-- End Title -->
			</div>
			<div class="col s4 right-align">
					<a class="btn btn-top waves-effect waves-light blue lighten-1" href="/tickets/assign">Asignados</a>
			</div>
		</div>
		<div class="section"> 
			<!-- section content start-->
			<div class="section-inner">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
						<div class="mailbox">
							<div class="card-panel">
								<ul id="tabs-swipe-demo" class="tabs">
									<li class="tab col s3"><a class="active no-float" href="#inbox">En Espera</a></li>
									<li class="tab col s3"><a class="no-float" href="#detained">Detenidos</a></li>
									<li class="tab col s3"><a class="no-float" href="#in-progress">En Progreso</a></li>
									<li class="tab col s3"><a class="no-float" href="#finished">Terminados</a></li>
								</ul>
								<div id="inbox" class="s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>N°</th>
												<th>Solicitado Por</th>
												<th>Fecha</th>
												<th>Descripción</th>
												<th>Avance</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											@forelse($ticketsInbox as $ticket)
												<tr>
													<td>{{ $ticket->id }}</td>
													<td>{{ $ticket->user->name }}</td>
													<td>{{ $ticket->created_at->format('d-m-Y') }}</td>
													<td>{{ $ticket->body }}</td>
													<td>{{ $ticket->progress }}%</td>
													<td>{{ $ticket->currentStatus() }}</td>
													<td class="center-align"><a href="/tickets/edit/{{ $ticket->id }}"><i class="material-icons">edit</i></a></td>
												</tr>
											@empty
												<tr>
													<td colspan=5 class="center-align">{{ $messageDefault }}</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>
								<div id="detained" class="s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>N°</th>
												<th>Solicitado Por</th>
												<th>Fecha</th>
												<th>Descripción</th>
												<th>Avance</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											@forelse($ticketsDetained as $ticket)
												<tr>
													<td>{{ $ticket->id }}</td>
													<td>{{ $ticket->user->name }}</td>
													<td>{{ $ticket->created_at->format('d-m-Y') }}</td>
													<td>{{ $ticket->body }}</td>
													<td>{{ $ticket->progress }}%</td>
													<td>{{ $ticket->currentStatus() }}</td>
													<td class="center-align"><a href="/tickets/edit/{{ $ticket->id }}"><i class="material-icons">edit</i></a></td>
												</tr>
											@empty
												<tr>
													<td colspan=5 class="center-align">{{ $messageDefault }}</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>								
								<div id="in-progress" class="s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>N°</th>
												<th>Solicitado Por</th>
												<th>Fecha</th>
												<th>Descripción</th>
												<th>Avance</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											@forelse($ticketsInProgress as $ticket)
												<tr>
													<td>{{ $ticket->id }}</td>
													<td>{{ $ticket->user->name }}</td>
													<td>{{ $ticket->created_at->format('d-m-Y') }}</td>
													<td>{{ $ticket->body }}</td>
													<td>{{ $ticket->progress }}%</td>
													<td>{{ $ticket->currentStatus() }}</td>
													<td class="center-align"><a href="/tickets/edit/{{ $ticket->id }}"><i class="material-icons">edit</i></a></td>
												</tr>
											@empty
												<tr>
													<td colspan=5 class="center-align">{{ $messageDefault }}</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>
								<div id="finished" class="s12">
									<table class="highlight">
										<thead>
											<tr>
												<th>N°</th>
												<th>Solicitado Por</th>
												<th>Fecha</th>
												<th>Descripción</th>
												<th>Avance</th>
												<th>Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											@forelse($ticketsFinished as $ticket)
												<tr>
													<td>{{ $ticket->id }}</td>
													<td>{{ $ticket->user->name }}</td>
													<td>{{ $ticket->created_at->format('d-m-Y') }}</td>
													<td>{{ $ticket->body }}</td>
													<td>{{ $ticket->progress }}%</td>
													<td>{{ $ticket->currentStatus() }}</td>
													<td class="center-align"><a href="/tickets/edit/{{ $ticket->id }}"><i class="material-icons">edit</i></a></td>
												</tr>
											@empty
												<tr>
													<td colspan=5 class="center-align">{{ $messageDefault }}</td>
												</tr>
											@endforelse
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
	</div><!-- tab end -->
	
	{{--<div class="fixed-action-btn">
		<a href="/tickets/create" class="btn-floating btn-large waves-effect waves-light blue lighten-1"><i class="material-icons">create</i></a>
	</div> --}}
@endsection