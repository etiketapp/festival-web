<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class AdminNotificationRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'title'             => 'required',
            'text'              => 'required',
            'date'              => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title'         => trans('models.adminnotification.title'),
            'text'          => trans('models.adminnotification.text'),
            'date'          => trans('models.adminnotification.date'),
        ];
    }

}
