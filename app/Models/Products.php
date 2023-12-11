<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
    ];

    public function product_color()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function product_photo()
    {
        return $this->belongsTo(ProductPhoto::class);
    }

    public function product_share()
    {
        return $this->belongsTo(ProductShare::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
