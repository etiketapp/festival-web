<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FestivalGallery extends Model
{
    protected $fillable = [
        'draw_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function festival()
    {
        return $this->belongsTo(Festival::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
