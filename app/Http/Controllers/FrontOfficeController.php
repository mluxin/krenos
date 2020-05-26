<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        return view('frontoffice.show', ['training' => $training]);
    }

}
