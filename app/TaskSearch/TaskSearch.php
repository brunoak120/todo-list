<?php

namespace App\TaskSearch;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TaskSearch
{
    /**
     * @description função main que retorna os resultados da pesquisa
     * @param Request $filters
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function apply(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest($filters, (new Task)->newQuery()->where('user_id', auth()->user()->id));
        return static::getResults($query);
    }

    /**
     * @description Faz each na variavel $request caso existir a váriavel então ela entra no decorator
     * @param Request $request
     * @param Builder $query
     * @return Builder
     */
    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->all() as $filterName => $value) {
            if ($value != null) {
                $decorator = static::createFilterDecorator($filterName);
                if (static::isValidDecorator($decorator)) {
                    $query = $decorator::apply($query, $value);
                }
            }

        }
        return $query;
    }

    /**
     * @description Retorna o caminho do filtro do decorator
     * @param $name
     * @return string
     */
    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . studly_case($name);
    }

    /**
     * @description verifica se a classe que será usada existe
     * @param $decorator
     * @return bool
     */
    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    /**
     * @description depois de montar a SQL busca os dados e retorna
     * @param Builder $query
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    private static function getResults(Builder $query)
    {
        return $query->get();
    }
}