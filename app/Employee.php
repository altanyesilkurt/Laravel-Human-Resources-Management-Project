<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Employee
 *
 * @property-read \App\Company $company
 * @mixin \Eloquent
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property int $company_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereUpdatedAt($value)
 * @property int $department_id
 * @property int $branch_id
 * @property string $status
 * @property-read \App\Branch $branch
 * @property-read \App\Department $department
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereBranchId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereStatus($value)
 * @property int|null $title_id
 * @property-read \App\Title|null $title
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Employee whereTitleId($value)
 */
class Employee extends Model
{


    protected $fillable = [
        'firstname', 'lastname', 'phone', 'email', 'company_id','department_id','branch_id','title_id','status'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}

