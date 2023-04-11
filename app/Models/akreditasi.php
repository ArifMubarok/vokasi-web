<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akreditasi extends Model
{
    use HasFactory;

    protected $table = 'akreditasi';

    protected $fillable = [
        'prodi',
        'akreditasi',
        'nomorAkreditas',
        'masa'
    ];
}
