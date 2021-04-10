<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'priority', 'project_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * @param $query
     * @param $project_id
     * @return mixed
     */
    public function scopeByProjectId($query, $project_id)
    {
        return $query->where('project_id', $project_id);
    }

    /**
     * @param Project $project
     * @param $updatedTasks
     * @return bool
     */
    public static function resetPriorities(Project $project, $updatedTasks)
    {
        try {
            \DB::beginTransaction();
            //Delete all the tasks related to the given project
            $project->tasks()->delete();

            foreach ($updatedTasks as $task)
                Task::create([
                    'name' => $task['name'],
                    'priority' => $task['priority'],
                    'project_id' => $task['project_id'],
                ]);
            \DB::commit();
            return true;
        } catch (\Throwable $e) {
            Log::error($e->getMessage());

            $e = ErrorsLog::newError($e);
            \DB::rollback();
        }
    }

}
