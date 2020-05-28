@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des formations : </div>

                <div class="card-body">
                    <div>
                      <a href="{{ route('trainings/create') }}">Ajouter une formation</a>
                    </div>
                    <table>
                      <tr>
                          <th>Formations</th>
                          <th>Professeurs</th>
                          <th>Actions</th>
                      </tr>
                      @foreach ($trainings as $training)
                        <tr>
                            <td><a href="{{ route('trainings/show', $training->id) }}">{{ $training->label }}</a></td>
                            <td>{{ $training->teacher->user->name }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ url('trainings/edit', $training) }}">Edit</a>
                                <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ url('trainings/destroy', $training->id) }}">Delete</a>
                            </td>
                        </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
