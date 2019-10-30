<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class DrawRequest extends Request
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
            'sub_title'         => 'required',
            'content'           => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title'             => trans('models.draw.title'),
            'sub_title'         => trans('models.draw.sub_title'),
            'content'           => trans('models.draw.content'),
        ];
    }

}
