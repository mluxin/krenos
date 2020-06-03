@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes heures : </div>

                <div class="card-body">
                    <table>
                      <tr>
                          <th>Formations</th>
                          <th>Date</th>
                          <th>Nombres d'heures</th>
                      </tr>
                    @foreach ($sessions as $session)
                    <tr>
                        <td><a href="{{ route('session/show', $session->id) }}">{{ $session->label }}</a></td>
                        <td>{{ $session->training_day }}</td>
                        <td>{{ $session->effective_duration }}</td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
