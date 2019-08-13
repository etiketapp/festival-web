<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Draw extends Model
{
    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'last_date',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
