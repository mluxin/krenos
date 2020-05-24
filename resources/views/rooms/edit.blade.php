@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit the room {{$room->label}}</div>

                <div class="card-body">

                <form method="POST" action="{{ route('room/update', $room->id) }}">
                        @csrf
                        <input id="name" name="label" type="text" value="{{$room->label}}">
                        <button type="submit">Edit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection