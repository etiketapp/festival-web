<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    const LAST_VERSION_ANDROID   = 'last_version_android';
    const UPDATE_VERSION_ANDROID = 'update_version_android';
    const LAST_VERSION_IOS       = 'last_version_ios';
    const UPDATE_VERSION_IOS     = 'update_version_ios';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'value',
    ];
}
