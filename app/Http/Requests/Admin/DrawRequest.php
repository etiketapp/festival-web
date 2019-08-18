<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DrawRequest extends FormRequest
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
            'last_date'         => 'required',
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
            'last_date'         => trans('models.draw.last_date'),
            'content'           => trans('models.draw.content'),
        ];
    }

}
