<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChequeFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|alpha_num',
            'card_number'=>'required|numeric',
            'cheque_date'=>'required|date',
            'date'=>'required|date',
            'cheque_number'=>'required|numeric',
            'branch'=>'required|numeric',
            'currency'=>'required',
            'amount'=>'required',
            'word'=>'required',
            'depositor_name'=>'required|alpha_num',
            'depositor_phone'=>'required|phone',
        ];
    }
}
