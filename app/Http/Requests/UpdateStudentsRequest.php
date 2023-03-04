<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'txtFullName' => 'required',
            'txtGender' => 'required',
            'txtAddress' => 'required',
            'txtEmail' => [
                'required',
                Rule::unique("students",'email')->ignore($this->txtId, 'idstudents'),
                'email'
            ],
            'txtPhone' => 'required|numeric'
        ];
    }

    public function messages(): array
    {
        return [
            'txtFullName.required' => ':attribute field is required',
            'txtGender.required' => ':attribute field is required',
            'txtAddress.required' => ':attribute field is required',
            'txtEmail.required' => ':attribute field is required',
            'txtEmail.unique' => ':attribute field is ready',
            'txtPhone.required' => ':attribute field is required',

        ];
    }

    public function attributes(): array
    {
        return [
            'txtFullName' => 'Full Name',
            'txtGender' => 'Gender',
            'txtAddress' => 'Address',
            'txtEmail' => 'Email Address',
            'txtPhone' => 'Phone'
        ];
    }
}
