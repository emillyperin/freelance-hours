<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index');
    }

    public function show()
    {
        return view('projects.show', compact('project'));
    }
}
