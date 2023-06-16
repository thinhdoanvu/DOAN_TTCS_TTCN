<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //quan hệ 1:1  với 1 images chỉ 1 product
    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
