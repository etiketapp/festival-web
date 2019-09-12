<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;

class FestivalRequest extends Request
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
            'advice'            => 'required',
            'place'             => 'required',
            'price'             => 'required',
            'about'             => 'required',
            'start_date'        => 'required',
            'end_date'          => 'required',

            'category_id'       => 'required',
            'city_id'           => 'required',
            'county_id'         => 'required',
            'address'           => 'required',
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'title'         => trans('models.festival.title'),
            'sub_title'     => trans('models.festival.sub_title'),
            'advice'        => trans('models.festival.content'),
            'place'         => trans('models.festival.place'),
            'price'         => trans('models.festival.price'),
            'about'         => trans('models.festival.about'),
            'start_date'    => trans('models.festival.start_date'),
            'end_date'      => trans('models.festival.end_date'),


            'category_id'   => trans('models.festival.category_id'),
            'city_id'       => trans('models.festival.city_id'),
            'county_id'     => trans('models.festival.county_id'),
            'address'       => trans('models.festival.address'),
        ];
    }

}
