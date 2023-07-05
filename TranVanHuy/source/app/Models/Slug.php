<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Slug extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'slugs';
    protected $fillable = [ 
        'nameSlug',
        'slugable_id',
        'slugable_type',
    ];

    public function slugable(){
        return $this->morphTo();
    }
}
