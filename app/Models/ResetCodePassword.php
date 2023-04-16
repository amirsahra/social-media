<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ResetCodePassword extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'code', 'created_at'];
}
