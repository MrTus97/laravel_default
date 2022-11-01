<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Menu extends Model
{
    use HasFactory;
    
    // public function getMenu(){
    //     DB::table('menu')->get();

    // }

    // public function addMenu(){

        
    // }

    protected $table ='menus';

    protected $fillable =['name', 'user_id'];

}
