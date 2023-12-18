<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Support\Str;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($data) {
            $data->id = Str::uuid();
        });
    }

    protected $fillable = [
        'name',
        'username',
        'gender',
        'bio',
        'photo',
        'email',
        'password',
        'role',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the format of the primary key.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function follower()
    {
        return $this->belongsTo(Follower::class);
    }

    public function following()
    {
        return $this->belongsTo(Following::class);
    }

    public function product_share()
    {
        return $this->belongsTo(ProductShare::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
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
