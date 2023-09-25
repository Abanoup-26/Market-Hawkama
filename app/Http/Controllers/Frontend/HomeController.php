<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {   
        $projects = Project::paginate(9) ;
        return view('frontend.index' , compact('projects'));
    }

    public function show( Request $request )
    {
        $project = Project::find($request->id);
        
        return view('frontend.projects.show', compact('project'));
    }

}
