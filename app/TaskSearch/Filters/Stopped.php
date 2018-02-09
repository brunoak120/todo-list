<?php

namespace App\TaskSearch\Filters;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;

class Stopped implements Filter
{
    /**
     * @param Builder $builder
     * @param mixed $value
     * @return Builder|\Illuminate\Database\Query\Builder|static
     */
    public static function apply(Builder $builder, $value)
    {
        $stopped = Carbon::createFromFormat('d/m/Y', $value);
        $stopped = $stopped->format('Y-m-d');

        return $builder->whereDate('started', '<=', $stopped);
    }
}