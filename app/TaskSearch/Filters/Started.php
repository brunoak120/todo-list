<?php

namespace App\TaskSearch\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Started implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     * @return Builder|\Illuminate\Database\Query\Builder|static
     */
    public static function apply(Builder $builder, $value)
    {
        $started = Carbon::createFromFormat('d/m/Y', $value);
        $started = $started->format('Y-m-d');

        return $builder->whereDate('started', '>=', $started);
    }
}