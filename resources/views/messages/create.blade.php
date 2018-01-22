@extends('layout')

@section('content')
<div class="container">
    <h1>Nuevo Mensaje</h1>

    <!--breadcrum start-->
    <ol class="breadcrumb text-left">
        <li><a href="/inbox">Mensajes</a></li>
        <li class="active">Crear nuevo mensaje</li>
    </ol><!--breadcrum end-->

    <div class="card-panel">    
        <div class="row">
        
            <form class="col s12" method="POST" action="/messages" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="input-field col s12">
                        <input id="to_ids" name="to_ids" type="text" class="validate" required>
                        <label for="to_ids">Para </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                    <input id="cc" name="cc" type="text" class="validate">
                    <label for="cc">Con Copia </label>
                    </div>
                    <div class="input-field col s6">
                    <input id="bcc" name="bcc" type="text" class="validate">
                    <label for="bcc">Con Copia Oculta </label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                    <input id="subject" name="subject" type="text" class="validate" required>
                    <label for="subject">Asunto</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="body" name="body" class="materialize-textarea" required></textarea>
                        <label for="body">Mensaje</label>
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
                        <i class="material-icons left">send</i>Enviar
                    </button>
                </div>
            </form>

        </div>
        
    </div>

    @include('layouts.errors')

</div>
@endsection