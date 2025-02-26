<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class workstream extends Model
{
    protected $table = 'workstreams';
    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        
    ];
}
