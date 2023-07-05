<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailInvoice extends Model
{
    use HasFactory;
    protected $table = 'detail_invoices';
    public $timestamps = false;
    protected $fillable = [
        'invoice_id',
        'member_id',
        'product_id',
        'price',
        'amount',
        'total',
    ];
}
