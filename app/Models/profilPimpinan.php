<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profilPimpinan extends Model
{
    use HasFactory;

    protected $table = 'profilpimpinan';

    protected $fillable = [
        'name',
        'foto',
        'title',
        'kedudukan',
        'profil',
    ];
}
