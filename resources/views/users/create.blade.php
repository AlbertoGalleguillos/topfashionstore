@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="col s8">
			<h1 class="section-title" id="services">
				<span>Crear Usuario</span>	
			</h1><!-- End Title -->
		</div>

		<div class="section" id="inbox"> 
			<!-- section content start-->
			<div class="section-inner">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
						<div class="mailbox">
							<div class="card-panel">
								<form method="POST" action="/users/create">
								{{ csrf_field() }}
									<div class="row">
										<div class="input-field col s12">
											<input id="uid" name="uid" type="text" class="validate" required>
											<label for="uid">Usuario</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="name" name="name" type="text" class="validate" required>
											<label for="name">Nombre</label>
										</div>
										<div class="input-field col s6">
											<input id="email" name="email" type="email" class="validate">
											<label for="email">Email</label>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col s6">
											<select name="area" class="browser-default center-align">
													<option value="" disabled selected>Área</option>
													@foreach($areas as $area)
														<option value="{{ $area->id }}">{{ $area->name }}</option>
													@endforeach
											</select>
										</div>
										<div class="col s6">
											<select name="store" class="browser-default center-align">	
											<option value="" disabled selected>Sucursal</option>
													@foreach($stores as $store)
														<option value="{{ $store->id }}">{{ $store->name }}</option>
													@endforeach
											</select>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="password" name="password" type="password" class="validate" required>
											<label for="password">Password</label>
										</div>
										<div class="input-field col s6">
											<input id="password_confirmation" name="password_confirmation" type="password" class="validate" required>
											<label for="password_confirmation">Confirmar Password</label>
										</div>
									</div>
									<div class="col s12">
										<select multiple class="browser-default center-align" name="roles[]">
											<option value="" disabled>Roles</option>
											@foreach($roles as $role)
												<option value="{{ $role->id }}">{{ $role->description }}</option>
											@endforeach
										</select>
									</div>
									<div class="center-align">
										<button class="waves-effect waves-light btn blue lighten-1" type="submit">
										<i class="material-icons left">save</i>Guardar
									</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
		@include('layouts.errors')
	</div><!-- tab end -->
@endsection