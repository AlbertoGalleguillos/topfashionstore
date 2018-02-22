@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="col s8">
			<h1 class="section-title" id="services">
				<span>Mis Requerimientos</span>
			</h1><!-- End Title -->
		</div>

		<div class="section" id="inbox"> 
			<!-- section content start-->
			<div class="section-inner">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
						<div class="mailbox">
							<div class="card-panel">
								<table class="highlight">
									<thead>
										<tr>
											<th>N°</th>
											<th>Fecha</th>
											<th>Descripción</th>
											<th>Avance</th>
											<th>Estado</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
										@if (is_string($tickets))
											<tr>
												<td colspan=5 class="center-align">{{ $tickets }}</td>
											</tr>
										@else
											@foreach($tickets as $ticket)
											<tr>
												<td>{{ $ticket->id }}</td>
												<td>{{ $ticket->created_at->format('d-m-Y') }}</td>
												<td>{{ $ticket->body }}</td>
												<td>{{ $ticket->progress }}%</td>
												<td>{{ $ticket->currentStatus() }}</td>
												<td class="center-align"><a href="/tickets/{{ $ticket->id }}"><i class="material-icons">visibility</i></a></td>
											</tr>
											@endforeach
										@endif
									</tbody>
								</table>
								</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
	</div><!-- tab end -->
	
	<div class="fixed-action-btn">
		<a href="/tickets/create" class="btn-floating btn-large waves-effect waves-light blue lighten-1"><i class="material-icons">create</i></a>
	</div> 
@endsection