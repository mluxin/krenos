@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users List : </div>

                <div class="card-body">

                <form method="POST" action="{{ route('user/store') }}">
                        @csrf
                        <label for="name">Name :</label>
                        <input id="name" name="name" type="text">
                        <label for="surname">Email: </label>
                        <input id="email" name="email" type="text">
                        <label for="password">Password: </label>
                        <input id="password" name="password" type="password">
                        <label for="roles">Roles: </label>
                        <select name="role">
                        @foreach ($roles as $role)
                          <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                        </select>
                        <button type="submit">Create new user</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection