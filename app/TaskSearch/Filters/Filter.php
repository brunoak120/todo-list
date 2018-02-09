<?php

namespace App\TaskSearch\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    /**
     * @description classe interface do Filtro
     * @param Builder $builder
     * @param $value
     * @return mixed
     */
    public static function apply(Builder $builder, $value);
}