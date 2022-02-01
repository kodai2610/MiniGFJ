<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompany extends FormRequest
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
            //
            'name' => 'required|max:50',
            'email' => 'required|string|max:50|unique:companies',
            'password' => 'required|max:50|string|min:8|confirmed',
            'industry_id' => 'required',
            'prefecture_id' => 'required',
            'city_id' => 'required',
            'ceo' => 'required|max:50',
            'url' => 'required|max:255',
            'logo' => 'required',
            'staff_name' => 'required|max:50',
            'staff_email' => 'required|max:50',
        ];
    }
}
