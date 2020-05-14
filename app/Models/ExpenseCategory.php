<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $fillable = [
        'user_id',
        'category_name',
        'category_description'
    ];

    protected $date = ['created_at'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function expense() {
        return $this->hasMany(Expense::class,'category_id');
    }
}
