<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'comments';
    protected $fillable = [
        'userId',
        'body',
        'parent_id',
    ];

    public function commentable(){
        return $this->morphTo();
    }

    public function user(){
        return $this->hasOne(Member::class, 'id', 'userId');
    }

    public function replies(){
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
