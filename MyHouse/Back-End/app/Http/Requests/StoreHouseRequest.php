<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHouseRequest extends FormRequest
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
            'homeArea' => 'required|numeric|min:1',
            'floorNbrs' => 'required|integer|min:1',
            'Location' => 'required|max:100',
            'homePic' => 'required'
        ];
    }
}