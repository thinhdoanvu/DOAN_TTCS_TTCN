<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //định nghĩa đến bảng products 1 brand thì có nhiều product nên sd hasMany
    public function products(){
        return $this->hasMany(Product::class,'brand_id','id');
    }
}
