<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    protected $fillable = ['content','mention'];

    //public function
}
