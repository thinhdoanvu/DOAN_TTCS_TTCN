<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'post_categories';
    protected $fillable = [ 
        'name',
    ];
    
    public function posts(){
        return $this->belongsToMany(Post::class, 'post_postcategory', 'post_id', 'postcategory_id');
    }
}
