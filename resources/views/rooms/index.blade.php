@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des salles</div>

                <div class="card-body">
                <a class="btn btn-primary" href="{{ url('rooms/create') }}">Ajouter une salle</a>

                 <table>
                    <tr>
                        <th>Label</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($rooms as $room)
                    <tr>
                        <td><a href="{{ url('room/show', $room->id) }}">{{ $room->label }}</a></td>
                        <td><a class="btn btn-primary" href="{{ url('room/edit', $room->id) }}">Modifier</a> <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('room/destroy', $room->id) }}">Supprimer</a> </td>
                    </tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection