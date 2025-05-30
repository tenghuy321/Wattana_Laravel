<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductUnique extends Model
{
    protected $table = 'product_uniques';

    protected $primaryKey = 'id';

    protected $fillable = [
        'order',
        'title',
    ];

    protected $casts = [
        'title' => 'array',
    ];
}
