<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecomendationData extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'recomendation_datas';
    protected $fillable = [
        'color_id',
        'product_color_id',
    ];

    public function color()
    {
        return $this->hasMany(Colors::class, 'id', 'color_id');
    }

    public function product_color()
    {
        return $this->hasMany(ProductColor::class, 'id', 'product_color_id');
    }
}
