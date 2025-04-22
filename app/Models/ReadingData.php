<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReadingData extends Model
{
    protected $fillable = [
        'title',
        'author',
        'pages_read',
        'pages_in_book',
        'user_id'
    ];
}
