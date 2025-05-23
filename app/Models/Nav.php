<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nav extends Model
{
    protected $table = 'nav';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'title',
        'order',
    ];

    protected $casts = [
        'title' => 'array',
    ];
}
