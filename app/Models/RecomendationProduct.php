<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class RecomendationProduct extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->id = Str::uuid();
        });
    }

    protected $table = 'recomendation_products';
    protected $fillable = [
        'color_id',
        'product_id',
        'gender',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function color()
    {
        return $this->hasMany(Colors::class, 'id', 'color_id');
    }

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }
}
