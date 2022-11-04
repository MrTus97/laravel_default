<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class infoUser extends Model
{
    use HasFactory;
    protected $table = 'info_users';
    protected $fillable = [
        'avatar' ,
        'phone'
    ];
    public function getUser(){

        return $this->belongsTo(User::class);

    }
}
