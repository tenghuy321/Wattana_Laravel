<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicePage extends Model
{
    protected $table = 'servicepages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
