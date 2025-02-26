<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'about_paragraph',
        'image_1',
        'image_2',
        'image_3',
        'slider_heading1',
        'slider_heading2',
        'slider_heading3',
        'slider_heading4',
    ];
}
