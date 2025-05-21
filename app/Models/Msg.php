<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Msg extends Model
{
    protected $table = 'msgs';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'image'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
