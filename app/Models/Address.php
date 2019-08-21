<?php

namespace App\Models;

use DB;
use Geocoder\Laravel\Facades\Geocoder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'address',
        'location',

        'city_id',
        'county_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',

        'location',

        'id',
        'city_id',
        'county_id',
        'addressable_type',
        'addressable_id',
    ];

    protected $geofields = [
        'location',
    ];

    /*
     * ATTRIBUTE
     */
    public function getLocationAttribute($value)
    {
        if (!isset($this->attributes['location'])) {
            return null;
        }

        $value = $this->attributes['location'];

        // Coordinate Check
        if (!preg_match('/POINT\((?<latitude>\-?\d+(\.\d+)?)[\s,](?<longitude>-?\d+(\.\d+)?)\)/', $value, $matches)) {
            return null;
        }

        $location = new \stdClass();
        $location->latitude = (float)$matches['latitude'];
        $location->longitude = (float)$matches['longitude'];

        return $location;
    }

    public function setLocationAttribute($value)
    {
        $this->attributes['location'] = DB::raw("POINT($value)");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function county()
    {
        return $this->belongsTo(County::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
    }


    protected static function boot()
    {
        parent::boot();

        self::created(function (self $model) {

            /** @var City */
            $city = $model->city;
            $cityName = $city->title;

            /** @var County */
            $county = $model->county;
            $countyName = $county->title;

            $fullAddres = $model->address . ' ' . $countyName . ' / ' . $cityName;

            /** @var Address $geocode */
            $geocode = Geocoder::geocode($fullAddres)->get()->first();

            if ($geocode) {
                // Location
                $location = $geocode->getCoordinates()->getLatitude() . ',' . $geocode->getCoordinates()->getLongitude();

                $model->location = $location;
                //dd($dietician->location);
                //$model->save();

                $addressable = $model->addressable;
                $addressable->location = $location;
                $addressable->save();
            }
        });

        self::updated(function (self $model) {

            /** @var City */
            $city       = $model->city;
            $cityName   = $city->title;

            /** @var County */
            $county     = $model->county;
            $countyName = $county->title;

            $fullAddres = $model->address . ' ' . $countyName . ' / ' . $cityName;

            /** @var Address $geocode */
            $geocode = Geocoder::geocode($fullAddres)->get()->first();

            if ($geocode) {

                // Location
                $location = $geocode->getCoordinates()->getLatitude() . ',' . $geocode->getCoordinates()->getLongitude();

                $model->location = $location;
                //dd($model->location);
                //$model->save();

                $addressable = $model->addressable;
                $addressable->location = $location;
                $addressable->save();
            }
        });


    }//boot
}
