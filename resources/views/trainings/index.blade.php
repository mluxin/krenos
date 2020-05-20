@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Trainings List : </div>

                <div class="card-body">
                    <ul>
                      @foreach ($trainings as $training)
                      <li>
                          Formations : {{ $training->label }} - Professeur id :{{ $training->teacher_id }}
                      </li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
