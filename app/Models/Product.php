<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table ='products';

    protected $fillable =['name','content', 'user_id','menu_id'];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function user() {
        return $this-> belongsTo(User::class);
    }

}
