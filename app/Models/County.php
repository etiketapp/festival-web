<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\County
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $city_id
 * @property-read \App\Models\City $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\County[] $clinicals
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\County onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\County whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\County withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\County withoutTrashed()
 * @mixin \Eloquent
 */
class County extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'city_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',

        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

}
