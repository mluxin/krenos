@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste de mes formations : </div>

                <div class="card-body">
                    <table>
                      <tr>
                          <th>Formations</th>
                          <th>Nombre de sessions</th>
                      </tr>
                    @foreach ($trainings as $training)
                    <tr>
                        <td><a href="{{ route('trainings/show', $training->id) }}">{{ $training->label }}</a></td>
                        <td>{{ $training->sessions->count() }}</td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
