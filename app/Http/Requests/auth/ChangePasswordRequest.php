<?php

namespace App\Http\Requests\auth;

use App\Rules\VerifyPassword;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class ChangePasswordRequest extends FormRequest
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
            'password' => ['required', new VerifyPassword],
            'passwordNew' => 'required|different:password|min:6',
            'passwordConfirm' => 'required_with:passwordNew|same:passwordNew'
        ];
    }
}
