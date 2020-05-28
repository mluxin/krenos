@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit the training {{$training->label}}</div>

                <div class="card-body">

                <form method="POST" action="{{ route('trainings/update', $training) }}">
                        @csrf
                        <div>
                            <div>
                                <p> Formation actuelle : {{ $training->label }}</p>
                                <p> Professeur actuelle :  {{ $training->teacher->user->name }} </p>
                            </div>
                            <div>
                                  <input id="name" name="label" type="text" value="{{$training->label}}">
                            </div>
                            <div>
                                <label for="teacher_id">Professeurs disponibles :</label>
                                <select name="teacher_id" id="teacher_id">
                                    <option value="{{ $training->teacher_id }}">{{ $training->teacher->user->name }}</option>
                                </select>
                            </div>
                            <button type="submit">Edit</button>
                        </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection