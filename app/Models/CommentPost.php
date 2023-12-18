<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CommentPost extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->id = Str::uuid();
        });
    }

    protected $table = 'comment_post';
    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'id', 'post_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
