<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'firstname'=>'required|alpha_num',
            'lastname'=>'required|alpha_num',
            'phone'=>'numeric|required|min:11',
            'email'=>'email|required',
            'company_id'=>'required',
             'department_id'=>'required',
             'branch_id'=>'required',
             'title_id'=>'required',
        ];
    }
}
