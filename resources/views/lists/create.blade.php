@extends('layout')

@section('content')
<div class="container">
    <h1>Crear Lista de Distribución</h1>

    <!--breadcrum start-->
    <ol class="breadcrumb text-left">
        <li><a href="/lists">Listas de Distribución</a></li>
        <li class="active">Crear nueva lista</li>
    </ol><!--breadcrum end-->

    <div class="card-panel">    
        <div class="row">
        
            <form class="col s12" method="POST" action="/lists">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                    <input id="name" name="name" type="text" class="validate" required>
                    <label for="name">Nombre: </label>
                    </div>
                </div>
                <div class="center-align">
                    <button class="waves-effect waves-light btn blue lighten-1" type="submit">
                        <i class="material-icons left">save</i>Guardar
                    </button>
                </div>
            </form>

        </div>
        
    </div>

    @include('layouts.errors')

</div>
@endsection