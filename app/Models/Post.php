<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->id = Str::uuid();
        });
    }

    protected $table = 'posts';
    protected $fillable = [
        'user_id',
        'product_id',
        'caption',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }

    public function photo_post()
    {
        return $this->belongsTo(PhotoPost::class);
    }

    public function like_post()
    {
        return $this->belongsTo(LikePost::class);
    }

    public function comment_post()
    {
        return $this->belongsTo(CommentPost::class);
    }

    public function share_post()
    {
        return $this->belongsTo(SharetPost::class);
    }
}
