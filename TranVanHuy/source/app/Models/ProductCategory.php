<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'product_categories';
    protected $guarded = [];
    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany(Product::class, 'id_cate', 'id');
    }
}
