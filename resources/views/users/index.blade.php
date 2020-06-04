@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs : </div>
                <div class="card-body">
                    <button class="btn btn-primary"><a href="{{ route('users/create') }}">Créer un utilisateur</a></button>
                    <table>
                        <tr>
                            <th>Nom</th>
                            <th>Mail</th>
                            <th>Rôles</th>
                            <th>Actions</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td><a href="{{ route('user/show', $user->id) }}">{{ $user->name }}</a></td>
                            <td>{{ $user->email }} </td>
                            <td>{{ $user->role }} </td>
                            <td><a class="btn btn-primary" href="{{ route('user/edit', $user->id) }}">Edit</a> <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ route('user/destroy', $user->id) }}">Delete</a></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
@endsection
