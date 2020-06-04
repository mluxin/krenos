@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des sessions de {{ auth()->user()->name }}</div>

                <div class="card-body">
                <table>
                      <tr>
                          <th>Nom</th>
                          <th>Professeur</th>
                          <th>Formation</th>
                          <th>Date</th>
                          <th>Salle</th>
                          <th>Compte-rendu</th>
                          <th>Note</th>
                      </tr>
                    @foreach ($employee->sessions as $session) 

                      <tr>
                        
                            <td><a href="{{ route('session/show', $session) }}">{{$session->label}}</a></td>
                            <td>{{$session->teacher->user->name}} </td>
                            <td>{{$session->training->label}} </td>
                            <td>{{$session->training_day}} </td>
                            <td>{{$session->room->label}} </td>
                            @if($session->feedback === null)
                                <td>Pas encore de compte-rendu</td>
                                @else
                                <td>{{$session->feedback}} </td>
                            @endif
                            @if ($session->pivot->where([['employee_id', '=', $employee->id],['session_id', '=', $session->id]])->first()->grade === null)
                                    <td>
                                        Pas encore de note
                                    </td>
                            @else
                                <td>{{ $session->pivot->where([['employee_id', '=', $employee->id],['session_id', '=', $session->id]])->first()->grade }}</td>
                            @endif
                      </tr>
                    @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
