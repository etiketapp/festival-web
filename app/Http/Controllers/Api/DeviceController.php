<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\DeviceRequest;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param DeviceRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeviceRequest $request)
    {
        $device = Device::firstOrNew($request->only('platform', 'device_id', 'token'));
        $device->user()->associate($request->user('api'));
        $device->save();

        return response()->success($device);
    }
}