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
                        <th>Action</th>
                    </tr>

                    @foreach ($training->sessions as $session)
                    <tr>
                        <td><a href="{{ route('session/show', $session) }}">{{ $session->label }}</a></td>
                        <td>{{ $session->teacher->user->name }}</td>
                        <td>{{ $session->training_day }}</td>
                        <td>{{ $session->room->label }}</td>
                        <td>{{ $session->subscription }} / {{ $session->max_subscription }}</td>
                        @if($session->subscription < $session->max_subscription)
                        @if(!auth()->user() || auth()->user() && !is_null(auth()->user()->employee) && is_null(auth()->user()->employee->sessions()->where('session_id', '=', $session->id)->first() ))
                        <td>
                          <form method="POST" action="{{ route('session/subscribe') }}">
                            @csrf
                            <input type="hidden" value="{{ $session->id }}" name="session">
                            <button type="submit">S'inscrire</button>
                          </form>
                        </td>
                        @elseif (auth()->user() && is_null(auth()->user()->employee))
                          <td>Pas d'inscription possible</td>
                        @else
                        <td>
                          <form method="POST" action="{{ route('session/unsubscribe') }}">
                            @csrf
                            <input type="hidden" value="{{ $session->id }}" name="session">
                            <button type="submit">Désinscrire</button>
                          </form>
                        </td>
                        @endif
                        @else
                        <td>Session complète</td>
                        @endif
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection