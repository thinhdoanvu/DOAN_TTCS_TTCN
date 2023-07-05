<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'units';
    protected $guarded = [];
    protected $fillable = [
        'type',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id_unit', 'id');
    }
}
