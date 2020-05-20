@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User {{$user->name}} : </div>

                <div class="card-body">

                <table>
                    <tr>
                        <th>Nom</th>
                        <th>Mail</th>
                        <th>Rôles</th>
                    </tr>
                    <tr>
                        <td>{{ $user->name }} </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->role }} </td>
                    </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection