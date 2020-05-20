@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    

                    <h2>Session : {{ $sessions->label }}</h2>

                    <p>Prof : {{ $sessions->teacher->user->name }}</p>
                    <p>Date : {{ $sessions->training->label }}</p>
                    <p>Salle : {{ $sessions->room->label}} </p>
                    <p>Compte-rendu : 
                    @if($sessions->feedback != NULL)
                    {{ $sessions->feedback }} </p>
                    @else
                    Pas de compte rendu pour l'instant
                    @endif
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

</style>