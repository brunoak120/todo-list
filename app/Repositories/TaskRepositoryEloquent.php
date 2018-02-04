<?php

namespace App\Repositories;

use App\Criteria\FilterByUserCriteria;
use App\Models\Task;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class TaskRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class TaskRepositoryEloquent extends BaseRepository implements TaskRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Task::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(FilterByUserCriteria::class);
    }

    /**
     * @return mixed
     */
    public function getTasks()
    {
        $result = $this->scopeQuery(function ($query) {
            return $query->select('tasks.id', 'tasks.category_id', 'categories.user_id','tasks.title', 'tasks.content',
                'tasks.started', 'tasks.stopped', 'tasks.status' ,'categories.name');
        })->all();

        return $result;
    }

}
