<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    protected $casts = [
        'name' => 'array',
    ];
}
