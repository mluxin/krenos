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
                            <input id="label" name="label" type="text" placeholder="Label">
                            <select name="teacher_id"  placeholder="Teachers">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                @endforeach
                            </select>
                            <button type=“submit”>Create new training</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
