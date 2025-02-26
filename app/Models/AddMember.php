<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddMember extends Model
{
    protected $table = 'add_members';
    protected $fillable = [
        'image',
        'paragraph',
    ];
}
