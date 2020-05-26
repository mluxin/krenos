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
                @if($user->employee && $user->employee->sessions->count() > 0)
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
                        <td>
                            <form method="POST" action="{{ route('session/unsubscribe') }}">
                                @csrf
                                <input type="hidden" value="{{ $session->id }}" name="session">
                                <button type="submit">Désinscrire</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </table>
                    @else
                    <p>Aucune session</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection