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
                          <th>Noms</th>
                          <th>Prof de la session</th>
                          <th>Formations</th>
                          <th>Dates</th>
                          <th>Salles</th>
                          <th>CR</th>
                          <th>Notes</th>
                      </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
