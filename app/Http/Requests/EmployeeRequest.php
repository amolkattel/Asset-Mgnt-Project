<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EmployeeRequest extends Request
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
        $email_validation = $this->employees ? 'unique:employees,email,'.$this->employees : 'unique:employees';
        $mobile_validation = $this->employees ? 'unique:employees,mobile,'.$this->employees : 'unique:employees';
        $validation = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|max:50|'.$email_validation,
            'employee_number'  => 'required|numeric',
            'street_1'  => 'required',
            'street_2'  => '',
            'city'  => 'required|max:50',
            'state'  => '',
            'region'  => 'required',
            'country'  => 'required',
            'zip_code'  => 'required|max:8',
            'phone'  => '',
            'mobile'  => 'required|max:20|'.$mobile_validation,
            'marital_status'  => 'required',
            'dob'  => 'required',
            'ssn'  => 'required|max:11',
            'timezone'  => 'required',
            'drivers_license'  => '',
        ];
        return $validation;
    }
}
