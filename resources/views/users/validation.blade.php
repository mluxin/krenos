@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs à valider :</div>
                <div class="card-body">
                <a href="{{ route('users/index') }}">Retour aux utilisateurs</a>
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>Rôles</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->role }} </td>
                            <td><a class="btn btn-primary" href="{{ route('user/editRole', $user->id) }}">Attribuer un rôle</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection
