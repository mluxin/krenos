<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Training;

class FrontOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::all();
        return view('frontoffice.index', ['trainings' => $trainings]);
    }

    /**
     * Display the specified resource.
     *
     * @param Training $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('frontoffice.show', ['training' => $training]);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscription(Request $request)
    {
        // sessions() instead of sessions, bc we want to attach employee_id and session_id,
        // not every sessions for this employee
        Auth::user()->employee->sessions()->attach($request->session);

        return redirect()->back();
    }

}
