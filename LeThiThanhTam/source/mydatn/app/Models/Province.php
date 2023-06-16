<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'quanhuyen';
    protected $primaryKey = 'maqh';

    public $timestamps = false;
    protected $fillable  = ['name_quanhuyen', 'type', 'matp'];
}
