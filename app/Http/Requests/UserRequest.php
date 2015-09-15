<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Http\Requests\UserRequest;

class UserRequest extends Request
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
        $unique_vlaidation = $this->users ? 'unique:users,email,'.$this->users : 'unique:users';
        $validation = [
            'department_id' => 'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|'.$unique_vlaidation,
            'password' => 'required|confirmed|min:6'
        ];

        if(empty(Request::get('password')) && $this->users)
        {
            unset($validation['password']);
        }
        return $validation;
    }
}
