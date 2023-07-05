<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Password_reset extends Model
{
    use HasFactory;
    const UPDATED_AT = null;
    protected $table = 'password_resets';
    protected $guarded = [];
    protected $fillable = [
        'email',
        'token',
    ];
}
