<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $table = 'homes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'sub_title',
        'header',
        'body',
    ];

    protected $casts = [
        'title' => 'array',
        'sub_title' => 'array',
        'header' => 'array',
        'body' => 'array',
    ];
}
