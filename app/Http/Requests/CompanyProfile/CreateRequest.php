<?php

namespace App\Http\Requests\CompanyProfile;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'companyName' => 'required',
            'companyDocument' => 'required|min:11',
            'companyZipCode' => 'required|min:8',
            'companyState' => 'required',
            'companyCity' => 'required',
            'companyAddress' => 'required',
            'companyTel' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Campos obrigatórios não preenchidos',
            'companyZipCode.min' => 'Formato de CEP inválido',
            'companyDocument.min' => 'Formato de documento inválido',
        ];
    }
}
