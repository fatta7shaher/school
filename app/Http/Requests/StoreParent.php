<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParent extends FormRequest
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

            'email' => 'required|unique:my__parents,email',
            'password' => 'required',
            'name_father' => 'required',
            'name_father_en' => 'required',
            'job_father' => 'required',
            'job_father_en' => 'required',
            'national_id_father' => 'required|unique:my__parents,national_id_father,' ,
            'passport_id_father' => 'required|unique:my__parents,passport_id_father,' ,
            'phone_father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'nationality_father_id' => 'required',
            'blood_type_father_id' => 'required',
            'religion_father_id' => 'required',
            'address_father' => 'required',

            'name_mother' => 'required',
            'name_mother_en' => 'required',
            'national_id_mother' => 'required|unique:my__parents,national_id_mother,' ,
            'passport_id_mother' => 'required|unique:my__parents,passport_id_mother,' ,
            'phone_mother' => 'required',
            'job_mother' => 'required',
            'job_mother_en' => 'required',
            'nationality_mother_id' => 'required',
            'blood_type_mother_id' => 'required',
            'religion_mother_id' => 'required',
            'address_mother' => 'required',
            
        ];
    }
}
