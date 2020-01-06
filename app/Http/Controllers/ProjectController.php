<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;


class ProjectController extends Controller
{
    //

    public function create()
    {
        return view('projects.create' , [
//            'projects' => Project::all()
        ]);
    }

    public function store()
    {
        $this -> validate(request() , [
            'name' => 'required',
            'description' => 'required'
        ]);

        return['message' => 'Project created'];
    }
}
