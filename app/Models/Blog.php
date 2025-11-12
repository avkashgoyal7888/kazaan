<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'title',
        'sub_title',
        'content',
        'image',
        'slug',
        'status',
    ];
}
