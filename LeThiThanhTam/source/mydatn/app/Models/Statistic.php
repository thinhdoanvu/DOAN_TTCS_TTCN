<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $table = 'tbl_statistical';
    protected $primaryKey = 'id_statistical';
    protected $guarded = [];
    public $timestamps = false;
}
