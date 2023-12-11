<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhotoPost extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'photo_post';
    protected $fillable = [
        'post_id',
        'path',
    ];

    public function post()
    {
        return $this->hasMany(Post::class, 'id', 'post_id');
    }
}
