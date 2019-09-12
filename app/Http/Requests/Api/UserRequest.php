<?php

namespace App\Http\Requests\Api;

class UserRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route()->parameter('user');
        if ($id == 'me') {
            $id = $this->user()->id;
        }
        $rules = [
            'full_name'        => 'required|min:2',
            'email'            => 'required|email|unique:users,email,' . $id,
//            'birth_date'       => 'required|date_format:Y-m-d',
//            'gender'           => 'required|in:male,female',

        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'full_name'        => trans('models.user.full_name'),
            'email'            => trans('models.user.email'),
//            'birth_date'       => trans('models.user.birth_date'),
//            'gender'           => trans('models.user.gender'),
        ];
    }
}
