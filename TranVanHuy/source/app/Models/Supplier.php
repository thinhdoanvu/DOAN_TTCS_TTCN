<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'suppliers';
    protected $guarded = [];
    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id_suppli', 'id');
    }
}
