<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;
use App\Models\User;

class comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'name',
        'user_id',
        'new_id'
    ];

    public function getNew(){
        return $this->belongsTo(News::class,'new_id');
    }
    public function getUser(){
        return $this->belongsTo(User::class,'user_id');
    }
}
