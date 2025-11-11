<?php

// This file is part of the App\Http\Controllers namespace
namespace App\Http\Controllers;

use App\Models\Student; // @todo what is this for?

// @todo: Add comments. What is this class responsible for?
class StudentController extends Controller
{
    /**
     * @todo: What does the show function do? What parameters does it accept?
     */
    public function show($id) {
        /** 
         * @todo: What does the view function do? What parameters does it accept?
         */
        return view('/studentprofile', array('student'=>Student::find($id)));
    }

    /**
     * @todo: What does the list function do? What parameters does it accept?
     */
    public function list() {
        return view('/studentlisting', array('students'=>Student::all()));
    }
}