<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menulocation extends Model
{
    use HasFactory;
    protected $table = 'menulocations';
    protected $fillable = [ 
        'pos',
        'menu_id'
    ];
}
