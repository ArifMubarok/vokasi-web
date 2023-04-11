<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testimoni_prodi extends Model
{
    use HasFactory;

    protected $table = 'testimoni_prodi';

    protected $fillable = [
        'prodi_id',
        'foto',
        'name',
        'keterangan',
        'testimoni'
    ];
}