<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSections extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name_section_Ar' => 'required',
            'name_section_En' => 'required',
            'grade_id' => 'required',
            'class_id' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'name_section_Ar.required' => trans('validation.required'),
            'name_section_En.required' => trans('validation.required'),
            'grade_id.required' => trans('validation.required'),
            'class_id.required' => trans('validation.required'),
        ];
    }

}
