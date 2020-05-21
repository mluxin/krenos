@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">

                    <h2>Ajouter une session :</h2>


                    <form method="POST" action="{{ route('session/store', $training) }}">
                        @csrf
                        <div class="">
                        <div>
                            <label for="label">Nom de la session</label>
                            <input id="label" type="text" name="label" required autofocus>
                        </div>
                        <div>
                            <label for="label">Professeurs</label>
                            <select name="teacher_id">
                                @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="room">Salle</label>
                            <select name="room">
                                @foreach ($rooms as $room)
                                <option value="{{ $room->id }}">{{ $room->label }}</option>

                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="training_day">Date</label>
                            <input id="training_day" type="date" name="training_day" required autofocus>
                        </div>
                        <div>
                            <textarea id="feedback" name="feedback" rows="4" cols="50" placeholder="Ecrivez votre compte-rendu ici"></textarea>
                        </div>
                            <button type="submit">
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
