<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $table = 'aboutpages';

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
