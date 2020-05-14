<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guard = 'user';
    
    protected $date = ['created_at'];
    
    protected $fillable = [
        'name',
        'role_id',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];
    
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function category() {
        return $this->hasMany(ExpenseCategory::class,'user_id');
    }
}
