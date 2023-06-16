<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon';
    protected $primaryKey = 'id';

    public $timestamps = false;
    protected $fillable  = ['name', 'qty', 'condition','date_start', 'date_end', 'number','code', 'status', 'rank_id'];

    public function ranks(){
        return $this->belongsTo(Rank::class,'rank_id','id');
    }
}
