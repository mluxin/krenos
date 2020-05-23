<?php

namespace App\Http\Controllers;

use App\Session;
use App\Training;
use App\Teacher;
use App\Room;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sessions = Session::all();

        return view('sessions.index', ['sessions'=>$sessions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Training $training)
    {
        return view('sessions.create', ['training' => $training]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Training $training)
    {
        $session = new Session;
        $session->label = $request->label;
        $session->teacher_id = $request->teacher_id;
        $session->training_id = $training->id;
        $session->room_id = $request->room_id;
        $session->training_day = $request->training_day;

        $session->save();

        return redirect()->route('trainings/show', ['training' => $training]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        return view('sessions.show', ['sessions'=>$session]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }

    public function getRoomsAndTeachers(Request $request, $date)
    {

        $trainingDaySessions = Session::query()->where('training_day', '=', $date)->get();

        if ($trainingDaySessions->isEmpty())
        {
            // Push rooms' label into an array
            $roomsLabel = [];
            $rooms = Room::all()->each(function($room) use(&$roomsLabel){
                $roomsLabel[$room->id] = $room->label;
            });;

            // Push teachers' name into an array
            $teachersName = [];
            $teachers = Teacher::all()->each(function($teacher) use(&$teachersName){
                $teachersName[$teacher->id] = $teacher->user->name;
            });

            return response()->json(['rooms' => $roomsLabel, 'teachers' => $teachersName]);
        }
        else
        {
             /**
             * Get all rooms'ids
             * Make the difference (compare) between rooms'ids
             * And rooms'ids from trainingDaySessions (selected date)
             * Same for teachers
             */
            $rooms = Room::all()->pluck('id')->diff($trainingDaySessions->pluck('room_id'));
            $teachers = Teacher::all()->pluck('id')->diff($trainingDaySessions->pluck('teacher_id'));

            $roomsLabel = [];
            $teachersName = [];

            $rooms->each(function($room) use(&$roomsLabel) {
                $roomsLabel[$room] = Room::query()->where('id', '=', $room)->pluck('label')->first();
            });

            $teachers->each(function($teacher) use(&$teachersName){
                $teachersName[$teacher] = Teacher::query()->where('id', '=', $teacher)->first()->user->name;
            });

            return response()->json(['rooms' => $roomsLabel, 'teachers' => $teachersName]);
        }
    }

}
