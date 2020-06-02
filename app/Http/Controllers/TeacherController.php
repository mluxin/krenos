<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Training;
use App\Session;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showTrainings(Teacher $teacher)
    {
        $teacherId = Teacher::query()->where('user_id',"=", auth()->id())->first()->id;
        $trainings = Training::query()->where('teacher_id',"=", $teacherId)->get();

        return view('teachers.mytrainings', ['trainings'=>$trainings]);
        //
    }

    public function showSessions()
    {
        $teacherId = Teacher::query()->where('user_id',"=", auth()->id())->first()->id;
        $sessions = Session::query()->where('teacher_id',"=", $teacherId)->get();

        return view('teachers.mysessions', ['sessions'=>$sessions]);
    }

    public function addFeedback(Session $session, Request $request)
    {
        $session->update([
            'feedback' => $request->feedback,
        ]);

        return redirect()->back();
    }
}
