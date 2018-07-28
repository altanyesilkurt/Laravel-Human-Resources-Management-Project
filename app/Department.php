<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Department
 *
 * @property int $id
 * @property string $name
 * @property string $company_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Department extends Model
{
    protected $fillable = [
        'name','company_id'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
