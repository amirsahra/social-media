<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\EmbedsMany;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'type','body','image','video','status', 'user_id'];

    public function user (): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): EmbedsMany
    {
        return $this->embedsMany(Comment::class);
    }
}
