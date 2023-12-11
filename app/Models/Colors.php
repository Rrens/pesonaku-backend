<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Colors extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'colors';
    protected $fillable = [
        'color_hex'
    ];

    public function group()
    {
        return $this->belongsToMany(Products::class, 'recomendation_datas')->withTimestamps();
    }
}
