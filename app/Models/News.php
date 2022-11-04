<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\tag;
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

}
