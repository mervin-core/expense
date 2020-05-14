<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Role extends Model
{
    protected $fillable = [
        'role_name',
        'role_description',
    ];

    protected $dates = ['created_at'];
    
}
