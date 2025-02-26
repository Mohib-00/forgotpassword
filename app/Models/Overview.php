<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overview extends Model
{
    use HasFactory;

    protected $table = 'overview';

    protected $fillable = [
        'image',
        'heading',
        'paragraph',
        'number',
        'n_heading'
    ];

}
