<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumberValidateRule;
use Illuminate\Foundation\Http\FormRequest;

class UserInformationUpdateRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:20'],
            'last_name' => ['required', 'string', 'max:20'],
            'first_name_hiragana' => ['required', 'string', 'max:20'],
            'last_name_hiragana' => ['required', 'string', 'max:20'],
            'birth_date' => ['required', 'string'],
            'phone' => ['max:15', new PhoneNumberValidateRule()],
            'sales_in_charge' => ['string', 'max:40'],
            'cancel_at' => 'date',
            'profile_picture' => 'image|max:2048',
            'profile_picture_hidden' => 'required'
        ];
    }
}
