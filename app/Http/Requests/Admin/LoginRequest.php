<?php

namespace App\Http\Requests\Admin;

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
            'email'     => 'required|email|exists:admins,email',
            'password'  => 'required',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'email'     => trans('admin.login.email'),
            'password'  => trans('admin.login.password'),
        ];
    }

}
