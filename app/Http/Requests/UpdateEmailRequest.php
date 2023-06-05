<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmailRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'otp_code' => ['required', 'max:6']
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
            'otp_code.required' => trans('validation.support.please_enter_here'),
            'otp_code.max' => trans('validation.support.please_enter_here'),
            'email.required' => trans('validation.support.please_enter_here'),
            'email.email' => trans('validation.support.please_enter_email'),
        ];
    }
}
