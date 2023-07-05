<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';
    protected $guarded = [];
    protected $fillable = [
        'name',
        'image_path',
        'image_name',
        'amount',
        'price',
        'price_discount',
        'description',
        'status',
        'id_unit',
        'id_trademark',
        'id_cate',
        'id_suppli',
    ];

    public function units(){
        return $this->hasOne(Unit::class, 'id', 'id_unit');
    }

    public function categories(){
        return $this->hasOne(ProductCategory::class, 'id', 'id_cate');
    }

    public function trademarks(){
        return $this->hasOne(Trademark::class, 'id', 'id_trademark');
    }

    public function suppliers(){
        return $this->hasOne(Supplier::class, 'id', 'id_suppli');
    }

    public function promotions(){
        return $this->belongsToMany(Promotion::class, 'promotion_product');
    }

    public function scopeSearch($query){
        if(request('key')){
            $key = request('key');
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }

    public function members(){
        return $this->belongsToMany(Member::class, 'carts');
    }

    public function slug(){
        return $this->morphOne(Slug::class, 'slugable');
    }
}
