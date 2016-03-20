<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FindRequest extends Request
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
     * Change validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'motorcycleCheckbox.required_without_all' => 'Please select at least one vehicle type to search!',
            'carCheckbox.required_without_all' => 'Please select at least one vehicle type to search!',
            'truckCheckbox.required_without_all' => 'Please select at least one vehicle type to search!',
            'rvCheckbox.required_without_all' => 'Please select at least one vehicle type to search!',
            'maximum.numeric' => 'Please enter a number into maximum price!',
            'minimum.numeric' => 'Please enter a number into minimum price!',
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'motorcycleCheckbox' => 'required_without_all:carCheckbox,truckCheckbox,rvCheckbox',
            'carCheckbox' => 'required_without_all:motorcycleCheckbox,truckCheckbox,rvCheckbox',
            'truckCheckbox' => 'required_without_all:motorcycleCheckbox,carCheckbox,rvCheckbox',
            'rvCheckbox' => 'required_without_all:motorcycleCheckbox,carCheckbox,truckCheckbox',
            'maximum' => 'numeric',
            'minimum' => 'numeric',
            //
        ];
    }

}
