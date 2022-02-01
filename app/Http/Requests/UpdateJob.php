<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJob extends FormRequest
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
            'title' => 'required|max:50',
            'display_message' => 'required|max:255',
            'occupation_id' => 'required',
            'content' => 'required|max:255',
            'salary_min' => 'required',
            'location' => 'required|max:255',
            'work_hour' => 'required|max:255',
            'empTypes' => 'required',
            'feature_ids' => 'required',
        ];
    }
}
