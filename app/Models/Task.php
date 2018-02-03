<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Task.
 *
 * @package namespace App\Entities;
 */
class Task extends Model implements Transformable
{
    use TransformableTrait, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'content',
        'started',
        'stopped'
    ];

    public function setStartedAttribute($started)
    {
        $started = Carbon::createFromFormat('d/m/Y', $started);
        $this->attributes['started'] = $started->format('Y-m-d');
    }

    public function getStartedAttribute()
    {
        $started = Carbon::createFromFormat('Y-m-d', $this->attributes['started']);
        return $started->format('d/m/Y');
    }

    public function setStoppedAttribute($stopped)
    {
        $stopped = Carbon::createFromFormat('d/m/Y', $stopped);
        $this->attributes['stopped'] = $stopped->format('Y-m-d');
    }

    public function getStoppedAttribute()
    {
        $stopped = Carbon::createFromFormat('Y-m-d', $this->attributes['stopped']);
        return $stopped->format('d/m/Y');
    }
}
