<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductShare extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_share';
    protected $fillable = [
        'user_id',
        'product_id',
        'link',
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }
}
