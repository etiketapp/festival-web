<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Festival extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'place',
        'price',
        'about',
        'date',

        'category_id',
        'like_id',
        'location',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $geofields = [
        'location',
        'distance',
    ];

    //SCOPE
    public function scopeDistance($query, $location)
    {
        if ($location) {
            // Nulları en arkaya atmak için - ile çarpıp, sıralamayı asc yerine desc yazıyoruz.
            $query->orderBy(DB::raw('-distance'), 'desc');

            return $query->addSelect(DB::raw('st_distance(location,POINT(' . $location . '))*111195 as distance'));
        }

        return $query->addSelect(DB::raw('null as distance'));
    }

    //ATTRIBUTE
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

    public function getDistanceAttribute($value)
    {
        if (!isset($this->attributes['distance'])) {
            return null;
        }
        return $this->attributes['distance'];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
