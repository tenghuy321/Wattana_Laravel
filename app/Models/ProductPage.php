<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductPage extends Model
{
    protected $table = 'productpages';

    protected $primaryKey = 'id';

    protected $fillable = [
        'content',
        'title',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];
}
