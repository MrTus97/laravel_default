<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class tag extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $fillable = [
        'name'
    ];
    public function getNew(){
        return $this->belongsToMany(News::class);
    }
}
