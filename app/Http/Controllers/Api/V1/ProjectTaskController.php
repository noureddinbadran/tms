<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectTaskController extends Controller
{
    /**
     * @param Request $request
     * @param $project_id
     */
    public function updatePriorities(Request $request, $project_id)
    {
        $project = Project::find($project_id);

        if (!$project)
            return \response([], Response::HTTP_NOT_FOUND);

        $updatedTasks = $request->tasks;
        if (Task::resetPriorities($project, $updatedTasks))
            return \response([], Response::HTTP_OK);
        else
            return \response([], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}
