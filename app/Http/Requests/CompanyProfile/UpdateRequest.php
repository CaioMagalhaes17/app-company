<?php

namespace App\Http\Requests\CompanyProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'companyZipCode' => 'min:8',
            'companyDocument' => 'required|min:11',
        ];
    }

    public function messages()
    {
        return [
            'companyZipCode.min' => 'Formato de CEP inválido',
            'companyDocument.min' => 'Formato de documento inválido',
        ];
    }
}
