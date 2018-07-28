<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Title
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Title whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Title whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Title whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Title whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Employee[] $title
 */
class Title extends Model
{
    protected $fillable = [
        'name'
    ];
    public function title()
    {
        return $this->hasMany(Employee::class);
    }
}
