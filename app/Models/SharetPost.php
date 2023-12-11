<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SharetPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'share_post';
    protected $fillable = [
        'post_id',
        'user_id',
        'link',
    ];

    public function post()
    {
        return $this->hasMany(Post::class, 'id', 'post_id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
