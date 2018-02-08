@extends('layout')

@section('content')
<div class="container">
    <h1>Listas de distribución<h1>

    <div class="row">
        <div class="col s12">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th colspan="2" class="center-align">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lists as $list)
                    <tr>
                        <td>{{ $list->id }}</td>
                        <td>{{ $list->name }}</td>
                        <td width="3%" class="center-align">
                            <a href="/lists/{{ $list->id }}/edit">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                        <td width="3%" class="center-align"> 
                            <button class="btn-flat" type="submit" name="action">
                                <i class="material-icons">delete</i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="fixed-action-btn">
		<a href="/lists/create" class="btn-floating btn-large waves-effect waves-light blue lighten-1"><i class="material-icons">create</i></a>
	</div> 
@endsection