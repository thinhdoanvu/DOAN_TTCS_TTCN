<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'promotions';
    protected $guarded = [];
    protected $fillable = [
        'name',
        'type',
        'apply_for',
        'discount_rate',
        'date_start',
        'date_end',
        'active',
    ];

    public function products(){
        return $this->belongsToMany(Product::class, 'promotion_product');
    }
}
