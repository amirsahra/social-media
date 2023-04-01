<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;
use Jenssegers\Mongodb\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HybridRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile(): EmbedsOne
    {
        return $this->embedsOne(Profile::class);
    }

    public function friends(): EmbedsMany
    {
        return $this->embedsMany(Friend::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
