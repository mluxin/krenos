@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Validation des utilisateurs</div>
                <div class="card-body">
                <form method="POST" action="{{ route('user/updateRole', $user->id) }}">
                        @csrf
                        <p>Nome : {{$user->name}}</p>
                        <p>Adresse mail : {{$user->email}}</p>
                        <select name="role"  placeholder="Roles" class="form-control">
                        @foreach ($roles as $role)
                          <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                        </select>
                        <br>
                        <button type="submit" class="btn btn-primary">Edit</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection