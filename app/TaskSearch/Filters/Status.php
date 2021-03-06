<?php

namespace App\TaskSearch\Filters;

use Illuminate\Database\Eloquent\Builder;

class Status implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     * @return $this|Builder
     */
    public static function apply(Builder $builder, $value)
    {
        return $builder->where('status', $value);
    }
}