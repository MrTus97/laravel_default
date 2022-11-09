<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\tag;
use App\Models\User;
use App\Models\comment;
class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable =[
        'title',
        'content',
        'menu_id',
        'user_id',
        'desration',
        'image_path',
        'image_name'
    ];
    public function tag(){
        return $this->belongsToMany(tag::class);
    }
    public function menu(){
        return $this->belongsTo(Menu::class,'menu_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function getComment(){
        return $this->hasMany(comment::class,'new_id');
    }

}
