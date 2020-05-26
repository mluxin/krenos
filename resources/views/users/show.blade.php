@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User {{$user->name}} : </div>
                <div class="card-body">
                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Rôles</th>
                    </tr>
                    <tr>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->role }} </td>
                    </tr>
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-header">Sessions associées: </div>
                <div class="card-body">
                <table>
                    <tr>
                        <th>Noms</th>
                        <th>Prof de la session</th>
                        <th>Formations</th>
                        <th>Dates</th>
                        <th>Salles</th>
                        <th>Inscrits</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($user->employee->sessions as $session)
                    <tr>
                        <td><a href="{{route('session/show', $session->id)}}">{{ $session->label }}</a></td>
                        <td>{{ $session->teacher->user->name }}</td>
                        <td>{{ $session->training->label }}</td>
                        <td>{{ $session->training_day }}</td>
                        <td>{{ $session->room->label }}</td>
                        <td>{{ $session->subscription }} / {{ $session->max_subscription }}</td>
                        <td><a href="{{ route('') }}">Désinscrire</a></td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection