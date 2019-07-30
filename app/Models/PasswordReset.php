<?php

namespace App\Models;

use Carbon\Carbon;
use App\Mail\PasswordResetCreate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\PasswordReset
 *
 * @property int $id
 * @property string $email
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset valid()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\PasswordReset whereUserId($value)
 * @mixin \Eloquent
 */
class PasswordReset extends Model
{

    protected $fillable = [
        'email',
        'user_id',
    ];

    public function scopeValid($query)
    {
        return $query->where('created_at', '>', Carbon::now()->subDay());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            // Remove old tokens
            self::where('user_id', $model->user_id)->delete();

            $model->token = strtolower(str_random(64));
        });

        self::created(function ($model) {
            Mail::send(new PasswordResetCreate($model));
        });
    }
}
