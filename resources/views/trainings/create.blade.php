@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ajouter une formation</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('trainings/store') }}">
                            @csrf
                            <label for="label">Label :</label>
                            <input id="label" name="label" type="text">
                            <button type=“submit”>Create new training</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
