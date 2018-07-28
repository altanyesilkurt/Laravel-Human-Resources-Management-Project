<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @mixin \Eloquent
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $email
 * @property string $logo
 * @property string $website
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereWebsite($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Employee[] $employees
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Branch[] $branches
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Department[] $departments
 */
class Company extends Model
{

    protected $fillable = [
       'id' ,'name','address', 'phone', 'email','logo','website'
    ];
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function branches(){
        return $this->hasMany(Branch::class);
    }
}
