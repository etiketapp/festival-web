<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AdminRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
            'image'             => $this->isMethod('post') ? 'required|image' : '',
            'email'             => 'required|email|unique:admins,email',
            'full_name'         => 'required',
            'gender'            => 'required|in:male,female',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'image'     => trans('models.common.image'),
            'email'     => trans('models.user.email'),
            'full_name' => trans('models.user.full_name'),
            'gender'    => trans('models.user.gender'),
            'password'  => trans('admin.login.password'),
        ];
    }

}
