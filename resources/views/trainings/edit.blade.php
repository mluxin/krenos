@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit the training {{$training->label}}</div>

                <div class="card-body">

                <form method="POST" action="{{ route('trainings/update', $training->id) }}">
                        @csrf
                        <input id="name" name="label" type="text" value="{{$training->label}}">
                        <button type="submit">Edit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection