<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrades extends FormRequest
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
        'Name' => 'required|unique:grades,Name->ar,'.$this->id,
        'Name_en'=> 'required|unique:grades,Name->en,'.$this->id,
        

         ];

    }

    public function messages(): array
    {
        return [
            'Name.required' => trans('validation.required'),
          
        ];
    }


}
