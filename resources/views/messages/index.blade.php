@extends('layouts.master')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <a href="/messages/inbox">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">inbox</i>
                    <p>Recibidos</p>
                </div>
            </a>
        </div>

        <div class="col s12 m6">
            <a href="/messages/sent">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">send</i>
                    <p>Enviados</p>
                </div>
            </a>
        </div>

        <div class="col s12 m12">
            <a href="/messages/trash">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">delete</i>
                    <p>Papelera</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection