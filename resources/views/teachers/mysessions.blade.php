@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste de mes sessions : </div>

                <div class="card-body">
                    <table>
                      <tr>
                          <th>Formations</th>
                          <th>Date</th>
                          <th>Salle</th>
                          <th>Nombres d'inscrits</th>
                      </tr>
                    @foreach ($sessions as $session)
                    <tr>
                        <td><a href="{{ route('session/show', $session->id) }}">{{ $session->label }}</a></td>
                        <td>{{ $session->training_day }}</td>
                        <td>{{ $session->room->label }}</td>
                        <td>{{ $session->subscription }} / {{ $session->max_subscription }}</td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
