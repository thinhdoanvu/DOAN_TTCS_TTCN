<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menunote extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'menunotes';
    protected $fillable = [ 
        'name',
        'parent_id',
        'slug',
        'menu_id',
    ];

    public function menuChildren(){
        return $this->hasMany(Menunote::class, 'parent_id');
    }

    public static function recursive($menunotes, $parents = 0, $level = 1, &$listNote){
        if(count($menunotes) > 0){
            foreach ($menunotes as $key => $value) {
                if($value->parent_id == $parents){
                    $value->level = $level;
                    $listNote[] = $value;
                    unset($menunotes[$key]);

                    $parent = $value->id;
                    self::recursive($menunotes, $parent, $level + 1, $listNote);
                }
            }
        }
    }
}
