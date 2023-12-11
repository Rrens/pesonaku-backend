<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPhoto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'photo_product';
    protected $fillable = [
        'product_id',
        'path',
    ];

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }
}
