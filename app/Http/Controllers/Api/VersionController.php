<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\VersionRequest;
use App\Models\Setting;
use App\Http\Controllers\Controller;

class VersionController extends Controller
{
    public function index(VersionRequest $request)
    {
        $version = $request->input('version');
        $platform = $request->input('platform');

        if ($platform == 'android') {
            $lastVersion = Setting::find(Setting::LAST_VERSION_ANDROID)->value;
            $updateVersion = Setting::find(Setting::UPDATE_VERSION_ANDROID)->value;
        } else {
            $lastVersion = Setting::find(Setting::LAST_VERSION_IOS)->value;
            $updateVersion = Setting::find(Setting::UPDATE_VERSION_IOS)->value;
        }

        if (version_compare($version, $updateVersion, '<')) {
            $status = -1;
        } elseif (version_compare($version, $lastVersion, '<')) {
            $status = 0;
        } else {
            $status = 1;
        }

        return response()->success([
            'status'             => $status,
        ], 'version.' . $status);
    }
}
