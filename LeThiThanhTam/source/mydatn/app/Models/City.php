<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'tinhthanhpho';
    protected $primaryKey = 'matp';

    public $timestamps = false;
    protected $fillable  = ['name_city', 'type'];
}
