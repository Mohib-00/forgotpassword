<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    protected $table = 'initiatives';
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
    ];
}
