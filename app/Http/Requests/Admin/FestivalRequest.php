<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FestivalRequest extends FormRequest
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
            'title'             => 'required',
            'sub_title'         => 'required',
            'content'           => 'required',
            'place'             => 'required',
            'price'             => 'required',
            'about'             => 'required',
            'date'              => 'required',

            'category_id'       => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'image'         => trans('models.common.image'),
            'title'         => trans('models.festival.title'),
            'sub_title'     => trans('models.festival.sub_title'),
            'content'       => trans('models.festival.content'),
            'place'         => trans('models.festival.place'),
            'price'         => trans('models.festival.price'),
            'about'         => trans('models.festival.about'),
            'date'          => trans('models.festival.date'),

            'category_id'   => trans('models.festival.category_id'),
        ];
    }

}
