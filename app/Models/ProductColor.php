<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductColor extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->id = Str::uuid();
        });
    }

    protected $table = 'products_color';
    protected $fillable = [
        'product_id',
        'product_hex',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }

    public function recomendation_product()
    {
        return $this->belongsTo(RecomendationProduct::class);
    }
}
