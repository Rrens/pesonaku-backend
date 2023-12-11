<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Following extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'follower_detail';
    protected $fillable = [
        'user_id',
        'following_id',
    ];

    public function user_id()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function following_id()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
