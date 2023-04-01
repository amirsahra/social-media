<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\EmbedsMany;
use Jenssegers\Mongodb\Relations\EmbedsOne;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name','gender','birthday','avatar','banner','bio'];

    public function skills(): EmbedsMany
    {
        return $this->embedsMany(Skill::class);
    }

    public function educations(): EmbedsMany
    {
        return $this->embedsMany(Education::class);
    }

    public function location(): EmbedsOne
    {
        return $this->embedsOne(Location::class);
    }
}
