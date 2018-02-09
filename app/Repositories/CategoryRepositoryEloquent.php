<?php

namespace App\Repositories;

use App\Criteria\FilterByUserCriteria;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Category;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
        $this->pushCriteria(FilterByUserCriteria::class);
    }

    public function getArrayCategoriesOrderlyByName()
    {
        $result = $this->scopeQuery(function ($query){
           return $query->orderBy('name');
        })->all()->pluck('name', 'id');

        return $result;
    }
    
}
