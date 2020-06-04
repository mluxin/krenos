@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liste des utilisateurs : </div>

                <div class="card-body">

                <form method="POST" action="{{ route('user/store') }}">
                        @csrf
                        <input id="name" name="name" type="text" placeholder="Name">
                        <input id="email" name="email" type="text"  placeholder="Email">
                        <input id="password" name="password" type="password"  placeholder="Password">
                        <select name="role"  placeholder="Roles">
                        @foreach ($roles as $role)
                          <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                        </select>
                        <button class="btn btn-primary" type="submit">Créer un utilisateur</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection