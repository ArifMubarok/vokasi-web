<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftarSenat extends Model
{
    use HasFactory;

    protected $table = 'daftarSenat';

    protected $fillable = [
        'name',
        'foto',
        'badanSenat',
        'kedudukanSenat',
        'value',
    ];
}
