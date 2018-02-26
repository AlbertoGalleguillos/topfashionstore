
@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container">
		<!-- Title -->
		<h1 class="section-title" id="services">
			<span>Profile</span>
		</h1><!-- End Title -->
	
		<!--breadcrum start-->
		<ol class="breadcrumb text-left">
		  	<li><a href="/dashboard">Dashboard</a></li>
		  	<li class="active">Profile</li>
		</ol><!--breadcrum end-->
	
		<div class="page-content profile-edit">
			<div class="pmd-card pmd-z-depth">
				<div class="pmd-card-body">
					<div class="row">
						<div data-provides="fileinput" class="fileinput fileinput-new col-lg-3">
							<div data-trigger="fileinput" class="fileinput-preview thumbnail img-circle img-responsive">
								<img src="/images/{{ auth()->user()->photo_url }}">
							</div>
							<div class="action-button"> 
								<span class="btn btn-default btn-raised btn-file ripple-effect">
									<span class="fileinput-new"><i class="material-icons md-light pmd-xs">add</i></span>
									<span class="fileinput-exists"><i class="material-icons md-light pmd-xs">mode_edit</i></span>
									<input type="file" name="...">
								</span> 
								<a data-dismiss="fileinput" class="btn btn-default btn-raised btn-file ripple-effect fileinput-exists" href="javascript:void(0);"><i class="material-icons md-light pmd-xs">close</i></a>
							</div>
						</div>
						<div class="col-lg-9 custom-col-9">
							<h3 class="heading">Información</h3>
							<div class="row">
								<form class="form-horizontal">
								  <fieldset>
										<div class="form-group prousername pmd-textfield">
										  <label class="control-label col-sm-3">Usuario</label>
										  <div class="col-sm-9">
											<p class="form-control-static"><strong>{{ auth()->user()->uid }}</strong></p>
										  </div>
										</div>
										<div class="form-group pmd-textfield">
										  <label class="col-sm-3 control-label" for="u_fname">Nombre</label>
										  <div class="col-sm-9">
                                            <p class="form-control-static"><strong>{{ auth()->user()->name }}</strong></p>
										  </div>
										</div>
								  </fieldset>
								</form>
                                <hr>
							</div>
							<h3 class="heading">Cambiar Contraseña</h3>
							<div class="row">	
								<form class="form-horizontal" method="POST" action="/profile">
									{{ csrf_field() }}
								  	<fieldset>
						                <div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="current_password">Contraseña Actual</label>
										<div class="col-sm-9">
											<input type="password" id="current_password" name="current_password">
										</div>
									</div>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="password">Nueva Contraseña</label>
										<div class="col-sm-9">
											<input type="password" id="password" name="password">
										</div>
									</div>
									<div class="form-group pmd-textfield">
										<label class="control-label col-sm-3" for="password_confirmation">Repetir Contraseña</label>
										<div class="col-sm-9">
											<input type="password" id="password_confirmation" name="password_confirmation">
											<span class="help-text">* Su contraseña debe contener al menos 6 caracteres</span>
										</div>
									</div>
									<div class="form-group btns">
									  	<div class="col-sm-9 col-sm-offset-3 center-align ">
											<button type="submit" class="btn waves-effect waves-blue blue lighten-1" formaction="/profile">
												Modificar
											</button>
										</div>
									</div>
								  	</fieldset>
                                  <br>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- tab end -->
	<div class="center-align">
			<br>
			<a href="{{ route('logout') }}" class="btn waves-effect waves-blue blue lighten-1"
				onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				Cerrar Sesión
			</a>
			<form id="logout-form" action="{{ route('logout') }}" method="POST">
				{{ csrf_field() }}
			</form>
	</div>
@endsection