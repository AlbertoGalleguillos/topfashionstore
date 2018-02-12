@extends('layout')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col s12 m6">
            <a href="/lists">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">group</i>
                    <p>Listas de Distribución</p>
                </div>
            </a>
        </div>

        <div class="col s12 m6">
            <a href="/meeting">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">work</i>
                    <p>Reuniones</p>
                </div>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <a href="/tickets">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">feedback</i>
                    <p>Requerimientos (Tickets)</p>
                </div>
            </a>
        </div>
        <div class="col s12 m6">
            <a href="/features">
                <div class="center promo card-panel"><br>
                    <i class="material-icons">assignment</i>
                    <p>Pendientes</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection