<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\EmbedsOne;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['content','mention'];

    public function author(): EmbedsOne
    {
        return $this->embedsOne(Author::class);
    }
}
