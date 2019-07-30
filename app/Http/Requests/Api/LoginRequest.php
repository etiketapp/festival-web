<?php

namespace App\Http\Requests\Api;


use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gsm'       => 'required_if:gsm,==,gsm|min:11',
            'email'     => 'required_if:email,==,email|email',
            'password'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'email'     => trans('models.user.email'),
            'gsm'       => trans('models.user.gsm'),
            'password'  => trans('models.user.password'),
        ];
    }
}
