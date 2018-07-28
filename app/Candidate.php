<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Candidate
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $company_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $cv
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Candidate whereCv($value)
 */
class Candidate extends Model
{
    protected $fillable = [
        'name','phone','company_id','cv'
    ];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
