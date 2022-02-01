<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompany extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|max:50',
            'password' => 'required|max:50',
            'industry_id' => 'required',
            'prefecture_id' => 'required',
            'city_id' => 'required',
            'ceo' => 'required|max:50',
            'url' => 'required|max:255',
            'staff_name' => 'required|max:50',
            'staff_email' => 'required|max:50',
        ];
    }
}
