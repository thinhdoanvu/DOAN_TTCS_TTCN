<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'imagePath',
        'imageName',
        'posterName',
        'content',
    ];
    protected $guarded = [];

    public function postcategories(){
        return $this->belongsToMany(PostCategory::class, 'post_postcategory', 'post_id', 'postcategory_id');
    }

    public function slug(){
        return $this->morphOne(Slug::class, 'slugable');
    }

    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')
            ->latest()
            ->whereNull('parent_id');
    }
}
