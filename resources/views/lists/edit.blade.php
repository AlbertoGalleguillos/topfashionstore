@extends('layout')

@section('content')
<div class="container">
    <h1>{{ $list->name }}</h1>

    <!--breadcrum start-->
    <ol class="breadcrumb text-left">
        <li><a href="/lists">Listas de Distribución</a></li>
        <li class="active">Agregar usuarios</li>
    </ol><!--breadcrum end-->

    <div class="card-panel">    
        <div class="row">
            <form class="col s12" method="POST" action="/lists/{{ $list->id  }}/addUser">
                {{ csrf_field() }}
                <div id="app">
                    <autocomplete-users></autocomplete-users>
                </div>
                <div class="center-align">
                    <button class="waves-effect waves-light btn blue" type="submit" formaction="/lists/{{ $list->id  }}/addUser">
                        <i class="material-icons left">save</i>Guardar
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if (count($list->listsUsers))
    <div class="card-panel">    
        <div class="row">
            <div class="col s12">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th class="right-align">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list->listsUsers as $listUser)
                        <tr>
                            <td>{{ $listUser->user->name }}</td>
                            <td class="right-align"> 
                                <form method="POST" action="/lists/removeUser/{{ $listUser->id }}">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn-flat" type="submit" formaction="/lists/removeUser/{{ $listUser->id }}">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </from>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif



    @include('layouts.errors')

</div>
@endsection