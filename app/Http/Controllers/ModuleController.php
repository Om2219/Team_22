<?php

// This file is part of the App\Http\Controllers namespace
namespace App\Http\Controllers;

use App\Models\Module; // @todo what is this for?

/**
 * @todo: Add comments. What is this class responsible for?
 * @todo: What artisan command was used to create this class?
 */
class ModuleController extends Controller
{
    /** 
     * @todo: What does the show function do? What parameters does it accept?
     */
    public function show($id)
    {
        /** 
         * @todo: What does the view function do? What parameters does it accept?
         */
        return view('/moduledetails', array('module' => Module::find($id)));
    }

    /**
     * @todo: What does the list function do? What parameters does it accept?
     */
    public function list()
    {
        return view('/modulelisting', array('modules' => Module::all()));
    }
}
