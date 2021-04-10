<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    public function index(Request $request, $project_id)
    {
        $project = Project::where('id', $project_id)->with('tasks')->first();

        if(!$project)
            return view('errors.404');
        $selectedProjectId = $project->id;
        $projects = Project::all();
        $tasks = $project->tasks;
        return view('projects.show-projects', compact('projects', 'tasks', 'selectedProjectId'));

    }


}
