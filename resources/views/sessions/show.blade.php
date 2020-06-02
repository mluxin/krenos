@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
            @if(auth()->user()->role !== App\User::EMPLOYEE && auth()->user()->role !== App\User::DEFAULT)
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
    <div class="row">
    @if ($session->feedback === null)
        <div class="col-md-6">

            <div class="card">
                <div class="card-header"> Compte rendu de la session {{ $session->label }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('teacher/feedback', $session->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="feedback">Ajouter votre compte rendu</label>
                            <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Enregistrer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    @endif
    </div>
</div>
@endsection