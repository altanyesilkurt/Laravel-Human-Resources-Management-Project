<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{

    protected $fillable = [
        'date','card_holder_name','card_number','cheque_date','cheque_name','branch','currency','amount','word',
        'total_amount','depositor_name','depositor_phone'
    ];
}
