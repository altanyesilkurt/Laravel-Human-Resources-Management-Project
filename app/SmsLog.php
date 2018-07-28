<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Sms_log
 *
 * @property int $id
 * @property int|null $tenant_id
 * @property int|null $sms_provider_id
 * @property int $type
 * @property int|null $event_type
 * @property string|null $to
 * @property string|null $message
 * @property string|null $queue_id
 * @property string|null $data Json Extra Data
 * @property string|null $response
 * @property int|null $status
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\SmsProvider|null $sms_provider
 * @property-read \App\Tenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereEventType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereQueueId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereSmsProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SmsLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SmsLog extends Model
{
    protected $table = 'sms_logs';


    public function smsProvider()
    {
        return $this->belongsTo(SmsProvider::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
