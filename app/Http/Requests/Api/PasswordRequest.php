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
            'password'      => 'required',
            'new_password'  => 'required',
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'password'        => trans('models.user.password'),
            'new_password'    => trans('models.user.new_password'),
//            'birth_date'       => trans('models.user.birth_date'),
//            'gender'           => trans('models.user.gender'),
        ];
    }
}
