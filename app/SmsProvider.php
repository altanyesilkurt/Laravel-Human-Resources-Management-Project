<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sms_provider
 *
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\SmsLog $sms_log
 * @method static \Illuminate\Database\Eloquent\Builder|SmsProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SmsProvider whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SmsProvider extends Model
{
    protected $table = 'sms_providers';
    public function smsLog()
    {
        return $this->belongsTo(SmsLog::class);
    }
}
