@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Formation #{{ $training->label }} par {{ $training->teacher->user->name }} </div>

                <div class="card-body">
                <h1>Sessions associées</h1>

                    <a href="{{ route('sessions/create', $training->id) }}">Create a session for #{{ $training->label }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
