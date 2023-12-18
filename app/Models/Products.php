<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Products extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($products) {
            $products->id = Str::uuid();
        });
    }

    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'price',
        'product_type',
        'product_hex',
    ];

    public function getKeyType()
    {
        return 'string';
    }

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
