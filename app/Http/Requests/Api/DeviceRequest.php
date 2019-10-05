<?php

namespace App\Http\Requests\Api;

class DeviceRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'platform' => 'required|in:ios,android,apns',
            'token'    => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'platform' => trans('models.device.platform'),
            'token'    => trans('models.device.token'),
        ];
    }
}
