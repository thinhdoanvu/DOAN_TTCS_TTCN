<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'fb_id',
        'total',

        'avatar',
        'level',
        'description',
        'street_address',

        'phone',
        // 'city',
        // 'province',
        // 'wards',
        'matp',
        'maqh',
        'maxp',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getRank(){
        // $total = $this->total ;
        // dd($total);
        $rank = Rank::where('value_from','<=',$this->total)                      
                                ->where('value_to','>=',$this->total)
                                ->first();
        return $rank['name'];
    }

    public function tinhthanhpho(){
        return $this->belongsTo(City::class,'matp','matp');
    }

    public function quanhuyen(){
        return $this->belongsTo(Province::class,'maqh','maqh');
    }

    public function xaphuongthitran(){
        return $this->belongsTo(Wards::class,'maxp','xaid');
    }
}
