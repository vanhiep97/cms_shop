<?php

namespace App\Http\Requests\auth;

use App\Rules\CodeVerifyValid;
use Illuminate\Foundation\Http\FormRequest;

class SetPasswordRequest extends FormRequest
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
            'passwordNew' => 'required|min:6',
            'passwordConfirm' => 'required_with:passwordNew|same:passwordNew|min:6',
            'codeVerify' => ['required', new CodeVerifyValid],
        ];
    }
}
