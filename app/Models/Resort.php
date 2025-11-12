<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resort extends Model
{
    protected $table = 'resorts';
    protected $fillable = [
        'resort_name',
        'resort_address',
        'primary_img',
        'img_1',
        'img_2',
        'img_3',
        'img_4',
        'img_5',
        'detail',
        'slug',
        'status'
    ];
}
