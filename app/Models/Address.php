<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Address extends Model
{
    use HasFactory;
    protected $fillable=['street','state','city'];
    public function user() {
        return $this-> belongsTo(User::class);
    }

    
}
