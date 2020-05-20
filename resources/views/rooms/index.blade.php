@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Users List : </div>

                <div class="card-body">

                <table>
                    <tr>
                        <th>Nom</th>
                    </tr>
                    @foreach ($rooms as $room)
                    <tr>
                        <td><a href="{{ url('room/show', $room->id) }}">{{ $room->label }}</a></td>
                    </tr>
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection