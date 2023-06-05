<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatOtpRequest extends FormRequest
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
            'email' => ['required', 'max:60', 'unique:users,email'],
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => trans('validation.support.please_enter_here'),
            'email.unique' => trans('validation.support.email_unique'),
            'email.max' => trans('validation.support.max_number'),
        ];
    }
}
