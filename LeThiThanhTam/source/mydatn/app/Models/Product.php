<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //product den brand
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }

    //product -> productcategory
    public function productCategory(){
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }

    //product -> productImage
    public function productImages(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function getDefaultSize(){
        $id = ($this->id);
        $listSize = Product::leftJoin('product_details','products.id','product_details.product_id')
                                ->where('products.id',$id)->get();
        return $listSize[0]['size'];
    }
    public function getDefaultColor(){
        $id = ($this->id);
        $productColors = Product::leftJoin('product_details','products.id','product_details.product_id')                      
                                ->where('products.id',$id)
                                ->groupBy('product_details.color')->get();
        return $productColors[0]['color'];
    }


    //product -> productdetail
    public function productDetails(){
        return $this->hasMany(ProductDetail::class,'product_id','id');
    }

    //product -> productcomment
    public function productComments(){
        return $this->hasMany(ProductComment::class,'product_id','id');
    }

    //product -> orderdetail
    public function orderDetails(){
        return $this->hasMany(OrderDatail::class,'product_id','id');
    }


}
