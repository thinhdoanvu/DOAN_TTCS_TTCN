<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;

    protected $table = 'xaphuongthitran';
    protected $primaryKey = 'xaid';

    public $timestamps = false;
    protected $fillable  = ['name_xaphuong', 'type', 'maqh'];
}
