<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section2 extends Model
{
    protected $table = 'section2s';
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
