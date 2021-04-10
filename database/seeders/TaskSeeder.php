<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = [
            ['name' => 'task1 - project1', 'priority' => 1, 'project_code' => 'proj1'],
            ['name' => 'task2 - project1', 'priority' => 2, 'project_code' => 'proj1'],
            ['name' => 'task1 - project2', 'priority' => 1, 'project_code' => 'proj2'],
            ['name' => 'task2 - project2', 'priority' => 2, 'project_code' => 'proj2'],
        ];

        foreach ($tasks as $task) {
            $project = Project::where('code', $task['project_code'])->first();
            if ($project)
                Task::firstOrCreate(['name' => $task['name'], 'project_id' => $project->id], [
                    'name' => $task['name'],
                    'priority' => $task['priority'],
                    'project_id' => $project->id,
                ]);
        }
    }
}
