<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Colors extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->id = Str::uuid();
        });
    }

    protected $table = 'colors';
    protected $fillable = [
        'color_hex'
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function group()
    {
        return $this->belongsToMany(Products::class, 'recomendation_datas')->withTimestamps();
    }
}
