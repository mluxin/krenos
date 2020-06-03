@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
              <div class="card-header">Nombres d'heures annuelles par professeurs </div>
                <div class="card-body">
                  @foreach($hoursByTeacher as $name => $hours)
                    <p>Récap heure {{ $name }}</p>
                  <table>
                      <tr>
                        <th>Date de la session</th>
                        <th>Heures effectuées</th>
                      </tr>
                        @foreach ($hours as $date => $hour)
                        <tr>
                          <td>{{ $date }}</td>
                          <td>{{ $hour }}</td>
                        </tr>
                        @endforeach
                    </table>
                    <br>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection