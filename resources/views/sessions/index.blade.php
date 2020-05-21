@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h2>Sessions :</h2>
                    <table>
                    <tr>
                        <th>Nom</th>
                        <th>Prof</th>
                        <th>Formation</th>
                        <th>Inscrits</th>
                        <th>Détails</th>
                    </tr>
                    @foreach ($sessions as $session)
                    <tr>
                        <td>{{ $session->label }}</td>
                        <td>{{ $session->training->teacher->user->name }}</td>
                        <td>{{ $session->training->label }}</td>
                        <td>{{ $session->subscription }} / {{ $session->max_subscription }}</td>
                        <td><a href="{{route('session/show', $session->id)}}">Voir les détails</a></td>
                        <td><a href="{{ route('sessions/create', $session->training) }}">Ajouter une session pour {{ $session->training->label }} </a></td>
                    </tr>
                    @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
