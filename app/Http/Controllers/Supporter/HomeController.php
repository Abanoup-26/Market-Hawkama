<?php

namespace App\Http\Controllers\Supporter;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(9) ;
        // when the supporter arrive here must register his data 
        return view('frontend.supporter.index' ,compact('projects'));
    }
}
