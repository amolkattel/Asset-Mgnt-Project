<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AssetRequest extends Request
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
        $unique_vlaidation = $this->assets ? 'unique:assets,asset_name,'.$this->assets : 'unique:assets';
        $validation = [
            'department_id' => 'required',
            'asset_name' => 'required|max:255|'.$unique_vlaidation,
            'description' => '',
            'location' => 'required|max:255',
            'status' => 'required'
        ];
        return $validation;
    }
}
