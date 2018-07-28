<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Branch
 *
 * @property int $id
 * @property string $name
 * @property string $company_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $address
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Branch whereAddress($value)
 */
class Branch extends Model
{
    protected $fillable = [
        'name','company_id','address'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
