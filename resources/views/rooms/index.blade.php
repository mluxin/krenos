@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users List : </div>

                <div class="card-body">

                <ul>
                    @foreach ($rooms as $room)
                        <li><a href="{{ url('room/show', $room->id) }}">{{ $room->label }}</a></li>
                    @endforeach
                </ul>

                <a href="{{ url('rooms/create') }}">Add a room</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection