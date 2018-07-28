<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Task
 *
 * @property int $id
 * @property string $task_name
 * @property string $end_date
 * @property string $start_date
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereTaskName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $hour
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Task whereHour($value)
 */
class Task extends Model
{
    protected $fillable = [
        'task_name','start_date','end_date',
    ];
}
