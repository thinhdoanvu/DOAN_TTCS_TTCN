<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices'; //khi tên bảng khác tên class
    protected $fillable = [
        'nameRecipient',
        'deliveryDate',
        'deliveryAddress',
        'phoneRecipient',
        'invoiceStatus',
        'total'
    ];
}
