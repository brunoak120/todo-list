<?php

namespace App\Repositories;

use App\Criteria\FilterByUserCriteria;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
    }

    public function getTaskById($id)
    {
        $result = $this->scopeQuery(function ($query) {
            return $query->select('tasks.id', 'tasks.category_id','tasks.title', 'tasks.content',
                'tasks.started', 'tasks.stopped', 'tasks.status', 'categories.name')
                ->join('categories', 'tasks.category_id', 'categories.id');
        })->findWhere(['tasks.user_id' => auth()->user()->id, 'tasks.id' => $id])->first();

        return $result;
    }


    public function filterTasks(Request $request)
    {
        $query = (new Task())->newQuery();

        $query->where('user_id', auth()->user()->id);

        if ($request->started != null){
            $started = Carbon::createFromFormat('d/m/Y', $request->started);
            $started = $started->format('Y-m-d');
            $query->whereDate('started', '>=', $started);
        }
        if ($request->stopped != null){
            $stopped = Carbon::createFromFormat('d/m/Y', $request->stopped);
            $stopped = $stopped->format('Y-m-d');
            $query->whereDate('stopped', '<=', $stopped);
        }
        if ($request->category_id != null){
            $query->where('category_id', $request->category_id);
        }
        if ($request->status != null){
            $query->where('status', $request->status);
        }

        return $query->get();
    }

}
