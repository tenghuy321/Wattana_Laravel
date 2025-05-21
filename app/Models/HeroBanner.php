<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroBanner extends Model
{
    protected $table = 'heroes';
    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'order'
    ];
}
