<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            ['name' => 'project1', 'code' => 'proj1'],
            ['name' => 'project2', 'code' => 'proj2'],
        ];

        foreach ($projects as $project)
            Project::firstOrCreate(['code' => $project['code']], $project);
    }
}
