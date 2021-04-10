<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use DatabaseMigrations, RefreshDatabase;

    protected function setUp(): void
    {
        //Seeding the data
        parent::setUp();
        Artisan::call('db:seed');
    }

    /** @test */
    public function a_user_can_update_the_priorities_of_the_tasks()
    {
        $project = Project::with('tasks')->where('code', 'proj1')->first();
        //Getting the tasks related to the project 1 by it's code
        $tasks = $project->tasks;

        $this->assertTrue(count($tasks) > 0);

        $this->assertTrue($tasks[0]->priority == 1);
        $this->assertTrue($tasks[1]->priority == 2);

        //Make the priority of task 1 is 2, and task 2 is 1
        $tasks[0]->priority = 2;
        $tasks[1]->priority = 1;
        $tasksNew = $tasks->toArray();

        //calling update priorities api
        $response = $this->putJson("/api/projects/" . $project->id . "/tasks/update-priorities", ['tasks' => $tasksNew]);
        $response->assertStatus(Response::HTTP_OK);

        //Check the new priorities of the tasks
        $tasks = Task::where('project_id', $project->id)->get();
        $this->assertTrue(count($tasks) > 0);

        $this->assertTrue($tasks[0]->priority == 2);
        $this->assertTrue($tasks[1]->priority == 1);
    }
}
