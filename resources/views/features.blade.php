@extends('layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col s12">
			<div class="center promo card-panel"><br>
				<table class="center">
					<thead>
						<tr>
						<th class="center">Prioridad</th>
							<th>Descripción</th>
							<th class="center">Desarrollo (Días)</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="center">0</td>
							<td><s>Migración de Sistema a Servidor (Instalación, Migración y Certificados)</s></td>
							<td class="center">2-3</td>
						</tr>    
						<tr>
							<td class="center">1</td>
							<td><s>Botón Eliminar Mensajes</s></td>
							<td class="center">1</td>
							</tr>
						<tr>
							<td class="center">2</td>
							<td>Botón Búsqueda de Mensajes - No todavía</td>
							<td class="center">2</td>
						</tr>
						<tr>
							<td class="center">3</td>
							<td>Módulo de Requerimientos (Tickets) - En progreso</td>
							<td class="center">5-10</td>
						</tr>
						<tr>
							<td class="center"d>4</td>
							<td>Módulo de Notificaciones</td>
							<td class="center">2-5</td>
						</tr>
						<tr>
							<td class="center">5</td>
							<td>Pantalla Cambio de clave y foto Usuario</td>
							<td class="center">2</td>
						</tr>
						<tr>
							<td class="center">6</td>
							<td>Página de Inicio</td>
							<td class="center">1</td>
						</tr>
						<tr>
							<td class="center">7</td>
							<td>Roles y Perfiles</td>
							<td class="center">5</td>
						</tr>
						<tr>
							<td class="center">8</td>
							<td>Módulo de Creación de Usuarios</td>
							<td class="center">1</td>
						</tr>
						<tr>
							<td class="center">9</td>
							<td>Comunicación y Encuesta para recibir feedback de los JDL</td>
							<td class="center">10</td>
						</tr>
						<tr>
							<td class="center">10</td>
							<td>Módulo de Minutas de Reuniones</td>
							<td class="center">2</td>
						</tr>          
						<tr>
							<td class="center">11</td>
							<td>Migración Ventas Históricas</td>
							<td class="center">2</td>
						</tr>          
						<tr>
							<td class="center">12</td>
							<td>Módulo Metas de Ventas</td>
							<td class="center">2</td>
						</tr>          
					</tbody>
				</table>   
			</div>
        </div>
    </div>
</div>
@endsection
