<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Menu extends Model
{

    use HasFactory;

    protected $table = 'menus';
    protected $fillable = [
        'name',
        'user_id'
    ];


}
