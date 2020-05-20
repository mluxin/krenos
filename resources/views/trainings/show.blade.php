@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header">Découvrez votre formation #{{ $training->label }}</div>

                <div class="card-body">
                    <table>
                      <tr>
                          <th>Formation</th>
                          <th>Professeur</th>
                          <th>Sessions</th>
                          <th>Actions</th>
                      </tr>
                        <tr>
                            <td>{{ $training->label }}</td>
                            <td>{{ $training->teacher->user->name }}</td>
                            <td>Liste des sessions</td>
                            <td>Update / Delete</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
