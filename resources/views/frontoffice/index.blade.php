@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des formations : </div>
                <div class="card-body">
                    <table>
                      <tr>
                          <th>Formations</th>
                          <th>Professeurs</th>
                      </tr>
                      @foreach ($trainings as $training)
                        <tr>
                            <td><a href="{{ route('frontoffice/show', $training->id) }}">{{ $training->label }}</a></td>
                            <td>{{ $training->teacher->user->name }}</td>
                        </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
