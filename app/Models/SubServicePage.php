<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubServicePage extends Model
{
    protected $table = 'sub_servicepages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'content',
        'icon'
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
