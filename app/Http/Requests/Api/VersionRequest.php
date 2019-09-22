<?php

namespace App\Http\Requests\Api;


class VersionRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'platform' => 'required|in:android,ios',
            'version'  => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'platform'  => trans('models.version.platform'),
            'version'   => trans('models.version.version'),
        ];
    }
}
