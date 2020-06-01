@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $session->label }} pour la formation #{{ $session->training->label }} </div>

                <div class="card-body">

                    <p>Prof : {{ $session->teacher->user->name }}</p>
                    <p>Date : {{ $session->training_day }}</p>
                    <p>Salle : {{ $session->room->label}} </p>
                    <p>Places maximales : {{ $session->max_subscription}}</p>
                    <p>Compte-rendu :
                    @if($session->feedback != NULL)
                    {{ $session->feedback }} </p>
                    @else
                    Pas de compte rendu pour l'instant
                    @endif
                </div>
            </div>
            <br/>
            @if( auth()->user() && auth()->user()->role !== App\User::EMPLOYEE &&  auth()->user()->role !== App\User::DEFAULT)
            <div class="card">
                <div class="card-header"> Inscrits pour la session {{ $session->label }} </div>
                <div class="card-body">
                <table>
                      <tr>
                          <th>Noms</th>
                          <th>Notes</th>
                          <th>Actions</th>
                      </tr>
                      @foreach ($session->employees as $employee)
                        <tr>
                            <td>{{ $employee->user->name }}</td>
                            <td>{{ $employee->pivot->where('session_id', '=', $session->id)->first()->grade }}</td>
                            <td><a href="#">Désinscrire</a></td>
                        </tr>
                      @endforeach
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection