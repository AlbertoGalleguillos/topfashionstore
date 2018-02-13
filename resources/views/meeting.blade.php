@extends('layout')

@section('content')
<br>
<div class="container">
    <div class="card-panel">
        <div class="row">
            <div class="col s9 center">
                <h1>Minuta de Reuniones</h1>
            </div>
            <div class="col s3 right-align">
                <h1>Fecha: 09/02/2017</h1>
            </div>
        </div>
        <hr>        
        <div class="row">
            <div class="col s6 center">
            <br>
                <h1>Integrantes:</h1>
            </div>
            <div class="col s6">
                <li>Lucio Ugolini</li>
                <li>Pilar Sepúlveda</li>
                <li>Bryan Peña</li>
                <li>Guimel Carrasco</li>
                <li>Alberto Galleguillos</li>
                <li>Bárbara Vergara</li>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col s6 center">
            <br>
                <h1>Asistentes:</h1>
            </div>
            <div class="col s6">
                <li>Lucio Ugolini</li>
                <li>Pilar Sepúlveda</li>
                <li>Bryan Peña</li>
                <li>Alberto Galleguillos</li>
            </div>
        </div>
        <hr>        
        <div class="row">
            <div class="col s6 center">
                <h1>Ausentes:</h1>
            </div>
            <div class="col s6">
                <li>Guimel Carrasco</li>
            </div>
        </div>
        <hr>        
        <div class="row">
            <div class="col s6 center">
                <br><br>
                <h1>Temas a Tratar:</h1>
            </div>
            <div class="col s6">
                <li>¿ Cómo queremos estar en 5 años más con el depto de IT?</li>
                <li>Organización del Equipo</li>
                <li>Contratación del Encargado de Hardware (Adán Galaz)</li>
                <li>Avances del Sistema Interno</li>
                <li>Posibles Módulos para el Sistema Interno</li>
                <li>Definir Objetivos a cumplir para la próxima reunión</li>
                <li>Capacitaciones: Metodologías Ágiles, Compra de libros</li>
                <li>Posibles automatizaciones de procesos del área</li>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col s6 center">
                <h1>Acuerdos Establecidos:</h1>
            </div>
            <div class="col s6">
                <li>Se expresa como necesidad urgente de contar con la figura de un líder en el equipo de IT, se propone a Bryan Peña como la persona para este cargo, 
                    puesto que las labores que realiza actualmente, hacen de él el candidato ideal para el cargo.</li>
                <li>Se verá la posibilidad de tomar un curso Sence de metodologías ágiles, se autoriza la compra del libro "Mastering Vue"</li>
                <li>Se definen requerimientos a seguir en torno al nuevo sistema web interno según la siguiente tabla:</li>
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
							<td>Migración de Sistema a Servidor (Instalación, Migración y Certificados)</td>
							<td class="center">2-3</td>
						</tr>    
						<tr>
							<td class="center">1</td>
							<td>Botón Eliminar Mensajes</td>
							<td class="center">1</td>
							</tr>
						<tr>
							<td class="center">2</td>
							<td>Botón Búsqueda de Mensajes</td>
							<td class="center">2</td>
						</tr>
						<tr>
							<td class="center"d>3</td>
							<td>Módulo de Notificaciones</td>
							<td class="center">2-5</td>
						</tr>
						<tr>
							<td class="center">4</td>
							<td>Módulo de Requerimientos (Tickets)</td>
							<td class="center">5-10</td>
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
					</tbody>
				</table>   
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col s6 center">
                <h1>Compromisos :</h1>
            </div>
            <div class="col s6">
                <li>Realizar los avances acordados del nuevo sistema interno para la próxima reunión</li>
                <li>Realizar los siguientes cambios en el sistema de inventario: Separar interfaces, crear visualizador de item pickeado, modificación para trabajar con los códigos nuevos.</li>
                <li>Implementar sistema de inventario en 25 locales, abarcando Santiago y V Región completa.</li>
            </div>
        </div>

    </div>
</div>
@endsection