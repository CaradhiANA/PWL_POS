<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Usermodel extends Authenticatable implements JWTSubject
{
    public function getJWTIdentifier(){
        return $this->getKey();
    }

    public function getJWTCustomClaims(){
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
        'image'

    ];

    public function level()
    {
        return $this->belongsTo(Levelmodel::class, 'level_id', 'level_id');
    }
    public function image(): Attribute {
        return Attribute::make(
            get: fn ($image) => url('storage/posts/' . $image),
        );
    }
}