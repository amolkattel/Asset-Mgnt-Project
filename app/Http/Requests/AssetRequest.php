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
        $unique_vlaidation = $this->assets ? 'unique:assets,asset_no,'.$this->assets : 'unique:assets';
        $validation = [
            'asset_no' => 'required|max:255|'.$unique_vlaidation,
            'name' => 'required|max:255',
            'description' => '',
            'model' => 'required|max:50',
            'serial' => 'required|max:50',
            'purchase_price' => 'required|max:50',
            'salvage_price' => '',
            'barcode' => '',
            'date_acquired' => 'required',
            'date_disposed' => '',
            'category_id' => 'required',
            'department_id' => 'required',
            'vendor_id' => 'required',
            'employee_id' => 'required',
            'location_lat' => '',
            'location_long' => '',
            'image' => 'mimes:png,jpeg,jpg',
            'status' => 'required'
        ];
        return $validation;
    }
}
