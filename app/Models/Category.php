<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
    ];

    public function wanteds()
    {
        return $this->hasMany(Wanted::class);
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
