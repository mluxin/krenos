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
                                  <label for="teacher_id">Professeurs</label>
                                  <select name="teacher_id"  placeholder="Teachers">
                                      @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                      @endforeach
                                  </select>
                            </div>
                            <button type="submit">Edit</button>
                            <a href="{{ url()->previous() }}">Annuler</a>
                        </div>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection