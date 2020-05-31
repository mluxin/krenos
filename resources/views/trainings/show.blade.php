@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Formation #{{ $training->label }} par {{ $training->teacher->user->name }} </div>

                <div class="card-body">
                <h2>Sessions associées</h2>

                <table>
                    <tr>
                        <th>Noms</th>
                        <th>Profs</th>
                        <th>Dates</th>
                        <th>Salles</th>
                        <th>Inscrits</th>
                        <th>Détails</th>
                        <th>Editer</th>
                        <th>Supprimer</th>
                    </tr>
                    @foreach ($training->sessions as $session)
                    <tr>
                        <td><a href="{{ route('session/show', $session) }}">{{ $session->label }}</a></td>
                        <td>{{ $session->teacher->user->name }}</td>
                        <td>{{ $session->training_day }}</td>
                        <td>{{ $session->room->label }}</td>
                        <td>{{ $session->subscription }} / {{ $session->max_subscription }}</td>
                        <td><a href="">S'inscrire</a></td>
                        <td><a href="{{ route('session/edit', $session) }}">Editer</a></td>
                        <td><a href="{{ route('session/destroy', $session) }}">Supprimer</a></td>
                    </tr>
                    @endforeach
                </table>
                <br/>
                <a href="{{ route('sessions/create', $training) }}">Create a session for #{{ $training->label }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
