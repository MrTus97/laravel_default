<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Menu;
use App\Models\News;
use App\Models\infoUser;
use App\Models\Role;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permission'
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
    ];
    public function getJWTIdentifier() {

        return $this->getKey();
    }

    /**
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
    public function getInfoUser(){
        return $this->hasOne(infoUser::class,'user_id');
    }
    public function getMenu(){
        return $this->hasMany(Menu::class,'user_id');
    }
    public function getNew(){
        return $this->hasMany(News::class,'user_id');
    }
    public function setRole(){
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
    public function getRole(){
        return $this->belongsToMany(Role::class);
    }

}
