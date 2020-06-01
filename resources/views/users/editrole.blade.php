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
                        <input id="name" name="name" type="text" value="{{$user->name}}">
                        <input id="email" name="email" type="text"  value="{{$user->email}}">
                        <select name="role"  placeholder="Roles">
                        @foreach ($roles as $role)
                          <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                        </select>
                        <button type="submit">Edit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection