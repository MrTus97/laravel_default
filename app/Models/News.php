<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable =[
        'title',
        'content',
        'menu_id',
        'user_id',
        'image_path',
        'image_name'
    ];

}
