<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    protected $table = 'core_values';

    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
        'title',
        'order'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
