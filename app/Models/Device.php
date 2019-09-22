<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Device
 *
 * @property-read \App\Models\User $user
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Device query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Device withoutTrashed()
 * @mixin \Eloquent
 */
class Device extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'platform',
        'brand',
        'model',
        'device_id',
        'token',

        'user_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}