<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Tenant
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\SmsLog $sms_log
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tenant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tenant extends Model
{
    protected $table = 'tenants';
    public function sms_log()
    {
        return $this->belongsTo(SmsLog::class);
    }
}
