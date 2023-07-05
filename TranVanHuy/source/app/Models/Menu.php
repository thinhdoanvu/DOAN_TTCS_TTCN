<?php

namespace App\Models;

use App\Models\Menunote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'menus';
    protected $fillable = [ 
        'name',
    ];

    public function menunote(){
        return $this->hasMany(Menunote::class);
    }

    public function menulocation(){
        return $this->hasMany(Menulocation::class);
    }
}
