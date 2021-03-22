<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custommer extends Model
{
    use HasFactory;
    protected $fillable = [ // Cac truong co the gan gia tri khi chay DB::create()
        'username',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [  // An cac truong khi thuc hien toArray or toJson
        'id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [ // quy dinh kieu du lieu cua cac truong
        
    ];
}
