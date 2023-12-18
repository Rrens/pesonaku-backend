<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Following extends Model
{
    use HasFactory, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->id = Str::uuid();
        });
    }

    protected $table = 'following_detail';
    protected $fillable = [
        'user_id',
        'following_id',
    ];

    public function getKeyType()
    {
        return 'string';
    }

    public function user_id()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function following_id()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
