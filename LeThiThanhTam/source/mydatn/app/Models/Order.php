<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $guarded = [];

    //order -> orderdetail
    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function tinhthanhpho(){
        return $this->belongsTo(City::class,'matp','matp');
    }

    public function quanhuyen(){
        return $this->belongsTo(Province::class,'maqh','maqh');
    }

    public function xaphuongthitran(){
        return $this->belongsTo(Wards::class,'maxp','xaid');
    }
}
