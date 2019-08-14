<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DrawUser extends Model
{
    protected $fillable = [
        'draw_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function draw()
    {
        return $this->belongsTo(Draw::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
