@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add a room </div>

                <div class="card-body">

                <form method="POST" action="{{ route('room/store') }}">
                        @csrf
                        <input id="name" name="label" type="text" placeholder="Label">
                        <button type="submit">Add</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection