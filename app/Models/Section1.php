<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section1 extends Model
{
    protected $table = 'section1s';
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
