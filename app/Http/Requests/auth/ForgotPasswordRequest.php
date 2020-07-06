<?php

namespace App\Http\Requests\auth;

use App\Rules\VetifyEmail;
use Illuminate\Foundation\Http\FormRequest;

class ForgotPasswordRequest extends FormRequest
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
            'email' => ['required', 'email', new VetifyEmail]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Vui lòng nhập vào tài khoản email',
            'email.email' => 'Nhập đúng định dạng email',
        ];
    }
}
