@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Formation #{{ $training->label }} par {{ $training->teacher->user->name }}</div>

                <div class="card-body">

                    <h2>Ajouter une session :</h2>


                    <form method="POST" action="{{ route('session/store', $training) }}">
                        @csrf
                        <div class="">
                        <div>
                            <label for="label">Nom de la session</label>
                            <input id="label" type="text" name="label" required autofocus>
                        </div>
                        <div>
                            <label for="training_day">Date</label>
                            <input id="training_day" type="date" name="training_day" required autofocus>
                            <button type="button" id="check_valid" >check dispo</button>
                        </div>
                        <div id="dynamic_inputs" style="display : none;">
                            <div>
                                <label for="teacher_id">Professeurs</label>
                                <select name="teacher_id" id="teacher_id">
                                </select>
                            </div>
                            <div>
                                <label for="room_id">Salle</label>
                                <select name="room_id" id="room_id">
                                </select>
                            </div>
                        </div>
                            <button type="submit">
                                Ajouter la session
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Ajax request to check which rooms and teachers are availables at this date-->

@section('js')
    <script>
        document.getElementById('check_valid').addEventListener('click', () => {
            const date = document.getElementById('training_day').value;
            const route = "{{ url('getDate') }}/";
            const url = route + date;

            $.ajax({
                url: url,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'post',
            }).done( (data) => {
                const selects = document.getElementById('dynamic_inputs');
                selects.style.display = 'block';

                const teacherSelect = document.getElementById('teacher_id');
                // Remove all options from the teacher select
                $("#teacher_id").empty();
                if(data.teachers.length != 0) {
                    for (let index in data.teachers) {
                        const optionTeacher = document.createElement('option');
                        optionTeacher.text = data.teachers[index];
                        optionTeacher.value = index;
                        teacherSelect.add(optionTeacher);
                    }
                } else {
                    const optionTeacher = document.createElement('option');
                    optionTeacher.text = 'Aucun professeur disponible à cette date';
                    teacherSelect.add(optionTeacher);
                }

                const roomSelect = document.getElementById('room_id');
                // Remove all options from the room select
                $("#room_id").empty();
                if(data.rooms.length != 0) {
                    for (let index in data.rooms) {
                        const optionRoom = document.createElement('option');
                        optionRoom.text = data.rooms[index];
                        optionRoom.value = index;
                        roomSelect.add(optionRoom);
                    }
                } else {
                    const optionRoom = document.createElement('option');
                    optionRoom.text = 'Aucune salle disponible à cette date';
                    roomSelect.add(optionRoom);
                }
            })
        })

    </script>
@endsection