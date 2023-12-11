<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductColor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products_color';
    protected $fillable = [
        'product_id',
        'product_hex',
    ];

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }

    public function recomendation_data()
    {
        return $this->belongsTo(RecomendationData::class);
    }
}
