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
            'houseArea' => 'required|numeric|min:1',
            'floorNbrs' => 'required|integer|min:1',
            'Location' => 'required|max:100',
            'housePic' => 'required',
            'description' => ['required','max:400'],
            'contractType'=>['required'],
            'housePrice'=>['required','numeric'],
            'houseTitle'=>['required']
        ];
    }
}