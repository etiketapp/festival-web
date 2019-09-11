<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'password'              => 'required',
            'new_password'          => 'min:6|required_with:password_confirmation|same:password_confirmation',
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'password'              => trans('models.user.password'),
            'new_password'          => trans('models.user.new_password'),
        ];
    }
}
