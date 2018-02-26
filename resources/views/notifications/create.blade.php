
@extends('layouts.master')

@section('content')
	<!--tab start-->
	<div class="container-fluid inbox">
		<!-- Title -->
		<div class="col s8">
			<h1 class="section-title" id="services">
				<span>Crear Requerimiento</span>
			</h1><!-- End Title -->
		</div>

		<div class="col s8">
			<!--breadcrum start-->
			<ol class="breadcrumb text-left">
			<li><a href="/tickets">Requerimientos</a></li>
			<li class="active">Nuevo Requerimiento</li>
			</ol><!--breadcrum end-->
		</div>

		<div class="section" id="inbox"> 
			<!-- section content start-->
			<div class="section-inner">
				<div class="row">
					<div class="col-lg-12 col-xs-12 col-sm-12 col-md-12">
						<div class="mailbox">
							<div class="card-panel">
								<form method="POST" action="/tickets" enctype="multipart/form-data">
									{{ csrf_field() }}
									<div class="row">
										<br>
										<div class="col s4 valign-wrapper">
											<span class="label-select">Área :</span>
										</div>
										<div class="col s8">
											<select name="area" class="browser-default center-align" autofocus required>
												<option value="" disabled selected>Seleccione Área Encargada</option>
												@foreach($areas as $area)
													<option value="{{ $area->id }}">{{ $area->name }} </option>
												@endforeach
											</select>
										</div>

									</div>
									<div class="row">
										<div class="input-field col s12">
          									<textarea name="body" id="body" class="materialize-textarea" required></textarea>
          									<label for="body">Descripción</label>
        								</div>
									</div>
									<div class="file-field input-field">
										<div class="btn blue lighten-1">
											<span>Adjuntar Archivo</span>
											<input type="file" name="attachments[]" multiple>
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Adjunta uno o más archivos">
										</div>
									</div>
									<div class="center-align">
										<button class="waves-effect waves-light btn blue lighten-1" type="submit">
											<i class="material-icons left">save</i>Guardar
										</button>
									</div>
								<form>
							</div>
						</div>
					</div>
				</div>
			</div> <!-- section content end -->  
		</div>
	</div><!-- tab end -->
@endsection