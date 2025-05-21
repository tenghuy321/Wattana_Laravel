<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title1',
        'title2',
        'title3',
        'sub_title',
        'phone_number',
        'head_office',
        'email',
        'location',
        'map_location',
        'facebook',
        'telegram',
        'line',
        'image'
    ];

    protected $casts = [
        'title1' => 'array',
        'title2' => 'array',
        'title3' => 'array',
        'sub_title' => 'array',
        'location' => 'array',
    ];
}
