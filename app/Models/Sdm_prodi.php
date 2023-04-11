<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sdm_prodi extends Model
{
    use HasFactory;

    protected $table = 'sdm_prodi';

    protected $fillable = [
        'prodi_id',
        'name',
        'email',
        'foto',
        'link_iris',
        'posisi'
    ];
}
