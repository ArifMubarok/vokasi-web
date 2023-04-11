<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilsambutan extends Model
{
    use HasFactory;

    protected $table = 'profilsambutan';

    protected $fillable = [
        'name',
        'title',
        'picture',
        'sambutan'
    ];
}
