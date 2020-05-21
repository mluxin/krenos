@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h2>Ajouter une session :</h2>


                    <form method="POST" action="{{ route('session/store') }}">
                        @csrf
                        <div class=“”>
                        <div>
                            <label for=“label”>Nom de la session</label>
                            <input id=“label” type=“text” name=“label” required autofocus>
                        </div>
                        <div>
                            <label for=“teacher_id”>Professeur</label>
                            <input id=“teacher_id” type=“text” name=“teacher_id” required autofocus>
                        </div>
                        <div>
                            <label for="training_id">Formation</label>
                            <input id="training_id" type=“text” name="training_id" required autofocus>
                        </div>
                        <div>
                            <label for=“room_id”>Salle</label>
                            <input id=“room_id” type=“text” name=“room_id” required autofocus>
                        </div>
                        <div>
                            <label for=“training_day”>Date</label>
                            <input id=“training_day” type=“date” name=“training_day” required autofocus>
                        </div>
                        <div>
                            <label for=“feedback”>Compte-rendu</label>
                            <input id=“feedback” type=“text” name=“feedback” required autofocus>
                        </div>
                            <button type=“submit”>
                                Ajouter la session
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
