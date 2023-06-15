<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function post(){
        return $this->hasMany(Post::class)->orderBy('date','DESC');
    }
}
