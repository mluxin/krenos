@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                @if(auth()->user()->role == App\User::ADMIN)
                    @include('dashboards.admin')
                @elseif(auth()->user()->role == App\User::TEACHER)
                    @include('dashboards.teacher')
                @elseif(auth()->user()->role == App\User::EMPLOYEE)
                    @include('dashboards.employee')
                @else
                    <a href="{{ route('profile') }}">Mon profile</a>
                    <p>Votre compte est en attente de validation par l'administrateur</p>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
