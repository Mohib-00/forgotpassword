<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support1 extends Model
{
    protected $table = 'support1s';
    protected $fillable = [
        'image',
        'paragraph',
    ];
}
