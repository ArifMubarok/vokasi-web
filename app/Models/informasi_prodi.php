<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class informasi_prodi extends Model
{
    use HasFactory;

    protected $table = 'informasi_prodi';

    protected $fillable = [
        'prodi_id',
        'header',
        'value'
    ];
}
