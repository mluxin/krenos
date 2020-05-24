@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des sessions</div>

                <div class="card-body">
                    <table>
                    <tr>
                        <th>Noms</th>
                        <th>Prof de la session</th>
                        <th>Formations</th>
                        <th>Dates</th>
                        <th>Salles</th>
                        <th>Inscrits</th>
                        <th>Création d'une session</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($sessions as $session)
                    <tr>
                        <td><a href="{{route('session/show', $session->id)}}">{{ $session->label }}</a></td>
                        <td>{{ $session->teacher->user->name }}</td>
                        <td>{{ $session->training->label }}</td>
                        <td>{{ $session->training_day }}</td>
                        <td>{{ $session->room->label }}</td>
                        <td>{{ $session->subscription }} / {{ $session->max_subscription }}</td>
                        <td><a href="{{ route('sessions/create', $session->training) }}">Créer</a></td>
                        <td><a href="{{ route('session/edit', $session) }}">Editer</a></td>
                    </tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
