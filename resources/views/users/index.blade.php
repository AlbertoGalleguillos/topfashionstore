@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="col s8">
			<h1 class="section-title" id="services">
				<span>Usuarios</span>
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
											<th class="center-align">Id</th>
											<th class="center-align">Usuario</th>
											<th class="center-align">Nombre</th>
											<th class="center-align">Email</th>
											<th class="center-align">Área</th>
											<th class="center-align">Tienda</th>
											<th class="center-align">Foto</th>
											<th class="center-align">Acciones</th>
										</tr>
									</thead>
									<tbody>
										@forelse($users as $user)
											<tr>
												<td class="center-align">{{ $user->id }}</td>
												<td class="center-align">{{ $user->uid }}</td>
												<td class="center-align">{{ $user->name }}</td>
												<td class="center-align">{{ $user->email }}</td>
												<td class="center-align">@if ($user->area)
																			{{ $user->area->name }}
																		@endif</td>
												<td class="center-align">@if ($user->store)
																			{{ 	$user->store->name }}
																		@endif</td>
												<td class="center-align"><img src="/images/{{ $user->photo_url }}"></td>
												<td class="center-align"><a href="/users/edit/{{ $user->id }}"><i class="material-icons">edit</i></a></td>

											</tr>
										@empty
											<tr>
												<td class="center-align">No has ingresado usuarios, crea uno con el botón de la esquina inferior derecha.</td>
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
		<div class="fixed-action-btn">
			<a href="/users/create" class="btn-floating btn-large waves-effect waves-light blue lighten-1"><i class="material-icons">add</i></a>
		</div> 
	</div><!-- tab end -->
@endsection